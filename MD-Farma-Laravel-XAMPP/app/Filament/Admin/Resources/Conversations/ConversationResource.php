<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations;

use App\Filament\Admin\Resources\Conversations\Pages\ChatConversation;
use App\Filament\Admin\Resources\Conversations\Pages\CreateConversation;
use App\Filament\Admin\Resources\Conversations\Pages\EditConversation;
use App\Filament\Admin\Resources\Conversations\Pages\ListConversations;
use App\Filament\Admin\Resources\Conversations\Schemas\ConversationForm;
use App\Filament\Admin\Resources\Conversations\Tables\ConversationsTable;
use App\Models\Conversation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class ConversationResource extends Resource
{
    protected static ?string $model = Conversation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChatBubbleLeftRight;

    protected static ?string $navigationLabel = 'Konsultasi';

    protected static ?string $modelLabel = 'Konsultasi';

    protected static ?string $pluralModelLabel = 'Konsultasi';

    protected static string|UnitEnum|null $navigationGroup = 'Layanan Apotek';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ConversationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConversationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConversations::route('/'),
            'create' => CreateConversation::route('/create'),
            'edit' => EditConversation::route('/{record}/edit'),
            'chat' => ChatConversation::route('/{record}/chat'),
        ];
    }
}
