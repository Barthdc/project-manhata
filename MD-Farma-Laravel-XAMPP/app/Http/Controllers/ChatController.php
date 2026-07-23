<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class ChatController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $query = Conversation::query()->with(['patient', 'doctor']);

        if ($user->isPatient()) {
            $query->where('patient_id', $user->id);
        } elseif ($user->isDoctor()) {
            $query->where(function ($builder) use ($user) {
                $builder->whereNull('doctor_id')
                    ->orWhere('doctor_id', $user->id);
            });
        } else {
            abort(403);
        }

        $conversations = $query
            ->latest('last_message_at')
            ->paginate(15);

        return view('chat.index', compact('conversations'));
    }

    public function create(Request $request): View
    {
        abort_unless($request->user()->isPatient(), 403);

        return view('chat.create');
    }

    public function storeConversation(Request $request): RedirectResponse
    {
        abort_unless($request->user()->isPatient(), 403);

        $data = $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $conversation = DB::transaction(function () use ($request, $data): Conversation {
            $conversation = Conversation::create([
                'patient_id' => $request->user()->id,
                'subject' => $data['subject'],
                'status' => 'open',
                'last_message_at' => now(),
            ]);

            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $request->user()->id,
                'body' => $data['message'],
            ]);

            return $conversation;
        });

        return redirect()->route('chat.show', $conversation);
    }

    public function show(Request $request, Conversation $conversation): View
    {
        $this->authorizeConversation($request, $conversation);

        if ($request->user()->isDoctor() && $conversation->doctor_id === null) {
            $conversation->update(['doctor_id' => $request->user()->id]);
        }

        $conversation->load(['patient.patientProfile', 'doctor', 'messages.sender']);

        Message::query()
            ->where('conversation_id', $conversation->id)
            ->where('sender_id', '!=', $request->user()->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('chat.show', compact('conversation'));
    }

    public function storeMessage(Request $request, Conversation $conversation): RedirectResponse
    {
        $this->authorizeConversation($request, $conversation);

        $data = $request->validate([
            'body' => ['required', 'string', 'max:3000'],
        ]);

        DB::transaction(function () use ($request, $conversation, $data): void {
            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $request->user()->id,
                'body' => $data['body'],
            ]);

            $conversation->update([
                'last_message_at' => now(),
                'status' => 'open',
            ]);
        });

        return redirect()
            ->route('chat.show', $conversation)
            ->withFragment('latest-message');
    }

    public function messages(Request $request, Conversation $conversation): JsonResponse
    {
        $this->authorizeConversation($request, $conversation);

        $afterId = max(0, $request->integer('after_id'));

        $messages = $conversation->messages()
            ->with('sender:id,name,role')
            ->where('id', '>', $afterId)
            ->get()
            ->map(fn (Message $message) => [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'sender_name' => $message->sender->name,
                'sender_role' => $message->sender->role,
                'body' => $message->body,
                'time' => $message->created_at->format('H:i'),
            ]);

        return response()->json(['messages' => $messages]);
    }

    public function close(Request $request, Conversation $conversation): RedirectResponse
    {
        $this->authorizeConversation($request, $conversation);

        abort_unless($request->user()->isDoctor(), 403);

        $conversation->update(['status' => 'closed']);

        return back()->with('success', 'Percakapan ditutup.');
    }

    private function authorizeConversation(Request $request, Conversation $conversation): void
    {
        $user = $request->user();

        $allowed = $user->isPatient()
            ? $conversation->patient_id === $user->id
            : $user->isDoctor()
                && ($conversation->doctor_id === null || $conversation->doctor_id === $user->id);

        abort_unless($allowed, 403);
    }
}
