<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public array $message;

    public function __construct(Message $message)
    {
        $message->load('sender');

        $this->message = [
            'id' => $message->id,
            'conversation_id' => $message->conversation_id,
            'sender_id' => $message->sender_id,
            'sender_name' => $message->sender?->name ?? 'User',
            'message' => $message->message,
            'created_at' => $message->created_at?->format('H:i'),
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('conversation.'.$this->message['conversation_id']),
        ];
    }

    public function broadcastAs(): string
    {
        return 'message.sent';
    }
}
