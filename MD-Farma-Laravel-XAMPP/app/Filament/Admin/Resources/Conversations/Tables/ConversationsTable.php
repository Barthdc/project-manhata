<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Tables;

use App\Filament\Admin\Resources\Conversations\ConversationResource;
use App\Models\Conversation;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

final class ConversationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query): Builder {
                return $query
                    ->with(['patient', 'staff', 'messages'])
                    ->withCount('messages')
                    ->latest('updated_at');
            })
            ->columns([
                TextColumn::make('patient.name')
                    ->label('Pasien')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subject')
                    ->label('Subjek')
                    ->default('Konsultasi Obat')
                    ->searchable(),

                TextColumn::make('messages_count')
                    ->label('Jumlah Pesan')
                    ->badge()
                    ->sortable(),

                TextColumn::make('staff.name')
                    ->label('Ditangani Oleh')
                    ->default('-'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'open' ? 'Open' : 'Closed')
                    ->color(fn (string $state): string => $state === 'open' ? 'success' : 'danger'),

                TextColumn::make('updated_at')
                    ->label('Terakhir Update')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'open' => 'Open',
                        'closed' => 'Closed',
                    ]),
            ])
            ->recordActions([
                Action::make('chat')
                    ->label('Buka Chat')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('primary')
                    ->url(fn (Conversation $record): string => ConversationResource::getUrl('chat', ['record' => $record])),

                EditAction::make()
                    ->label('Detail'),
            ]);
    }
}
