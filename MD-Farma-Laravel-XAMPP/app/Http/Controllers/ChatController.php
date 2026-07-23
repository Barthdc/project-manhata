<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class ChatController extends Controller
{
    public function index(): View
    {
        /**
         * Halaman /konsultasi hanya untuk user dengan role pasien.
         * Jadi admin/apoteker tidak menggunakan halaman ini.
         */
        if (! Auth::user()->hasRole('pasien')) {
            abort(403, 'Halaman konsultasi hanya untuk pasien.');
        }

        $conversation = Conversation::query()
            ->where('patient_id', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->first();

        if (! $conversation) {
            $conversation = Conversation::create([
                'patient_id' => Auth::id(),
                'staff_id' => null,
                'subject' => 'Konsultasi Obat',
                'status' => 'open',
            ]);
        }

        $messages = $conversation->messages()
            ->with('sender')
            ->oldest()
            ->get();

        return view('chat.index', [
            'conversation' => $conversation,
            'messages' => $messages,
        ]);
    }

    public function send(Request $request, Conversation $conversation): JsonResponse
    {
        /**
         * Hanya pasien yang boleh mengirim pesan dari halaman /konsultasi.
         * Admin/apoteker nanti membalas dari halaman Filament.
         */
        if (! Auth::user()->hasRole('pasien')) {
            abort(403, 'Hanya pasien yang dapat mengirim pesan dari halaman konsultasi.');
        }

        /**
         * Pastikan pasien hanya bisa mengirim pesan
         * ke conversation miliknya sendiri.
         */
        if ((int) $conversation->patient_id !== (int) Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke konsultasi ini.');
        }

        $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        if ($conversation->status === 'closed') {
            return response()->json([
                'success' => false,
                'message' => 'Konsultasi sudah ditutup.',
            ], 403);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
            'is_read' => false,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'conversation_id' => $message->conversation_id,
                'sender_id' => $message->sender_id,
                'sender_name' => Auth::user()->name,
                'message' => $message->message,
                'created_at' => $message->created_at->format('H:i'),
            ],
        ]);
    }
}
