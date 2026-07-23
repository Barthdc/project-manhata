<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Pages;

use App\Filament\Admin\Resources\Conversations\ConversationResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateConversation extends CreateRecord
{
    protected static string $resource = ConversationResource::class;
}
