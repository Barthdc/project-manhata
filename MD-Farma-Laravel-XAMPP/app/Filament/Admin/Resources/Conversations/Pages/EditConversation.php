<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Pages;

use App\Filament\Admin\Resources\Conversations\ConversationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditConversation extends EditRecord
{
    protected static string $resource = ConversationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }
}
