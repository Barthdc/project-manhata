<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class DashboardController extends Controller
{
    public function __invoke(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.patients.index');
        }

        if ($user->isDoctor()) {
            $conversations = Conversation::query()
                ->with(['patient', 'messages' => fn ($query) => $query->latest()->limit(1)])
                ->where(function ($query) use ($user) {
                    $query->whereNull('doctor_id')
                        ->orWhere('doctor_id', $user->id);
                })
                ->latest('last_message_at')
                ->paginate(12);

            return view('dashboard.doctor', compact('conversations'));
        }

        $conversations = Conversation::query()
            ->with('doctor')
            ->where('patient_id', $user->id)
            ->latest('last_message_at')
            ->paginate(12);

        return view('dashboard.patient', compact('conversations'));
    }
}
