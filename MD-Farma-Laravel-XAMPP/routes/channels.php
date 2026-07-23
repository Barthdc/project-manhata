<?php

declare(strict_types=1);

use App\Models\Conversation;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('conversation.{conversationId}', function ($user, $conversationId) {
    $conversation = Conversation::find($conversationId);

    if (! $conversation) {
        return false;
    }

    return (int) $conversation->patient_id === (int) $user->id
        || (int) $conversation->staff_id === (int) $user->id
        || $user->hasRole('super_admin')
        || $user->hasRole('admin')
        || $user->hasRole('apoteker')
        || $user->hasRole('staff');
});
