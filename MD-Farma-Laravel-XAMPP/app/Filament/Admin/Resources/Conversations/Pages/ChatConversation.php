<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Pages;

use App\Events\MessageSent;
use App\Filament\Admin\Resources\Conversations\ConversationResource;
use App\Models\Conversation;
use App\Models\Message;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

final class ChatConversation extends Page
{
    public Conversation $record;

    public string $message = '';

    protected static string $resource = ConversationResource::class;

    protected string $view = 'filament.admin.resources.conversations.pages.chat-conversation';

    public function mount(Conversation $record): void
    {
        $this->record = $record->load(['patient', 'staff', 'messages.sender']);

        if ($this->record->staff_id === null) {
            $this->record->update([
                'staff_id' => Auth::id(),
            ]);

            $this->record->refresh();
            $this->record->load(['patient', 'staff', 'messages.sender']);
        }
    }

    public function sendMessage(): void
    {
        $this->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        if ($this->record->status === 'closed') {
            Notification::make()
                ->title('Konsultasi sudah ditutup')
                ->danger()
                ->send();

            return;
        }

        $message = Message::create([
            'conversation_id' => $this->record->id,
            'sender_id' => Auth::id(),
            'message' => $this->message,
            'is_read' => false,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        $this->message = '';

        $this->record->refresh();
        $this->record->load(['patient', 'staff', 'messages.sender']);

        Notification::make()
            ->title('Pesan berhasil dikirim')
            ->success()
            ->send();
    }

    public function closeConversation(): void
    {
        $this->record->update([
            'status' => 'closed',
            'closed_at' => now(),
        ]);

        $this->record->refresh();

        Notification::make()
            ->title('Konsultasi berhasil ditutup')
            ->success()
            ->send();
    }

    public function reopenConversation(): void
    {
        $this->record->update([
            'status' => 'open',
            'closed_at' => null,
        ]);

        $this->record->refresh();

        Notification::make()
            ->title('Konsultasi berhasil dibuka kembali')
            ->success()
            ->send();
    }

    public function getTitle(): string
    {
        return 'Chat Konsultasi';
    }
}
