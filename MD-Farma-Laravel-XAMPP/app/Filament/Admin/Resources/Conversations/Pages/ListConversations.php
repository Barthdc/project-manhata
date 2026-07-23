<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Pages;

use App\Filament\Admin\Resources\Conversations\ConversationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListConversations extends ListRecords
{
    protected static string $resource = ConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
