<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Conversations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ConversationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Konsultasi')
                    ->schema([
                        Select::make('patient_id')
                            ->label('Pasien')
                            ->relationship('patient', 'name')
                            ->disabled(),

                        Select::make('staff_id')
                            ->label('Ditangani Oleh')
                            ->relationship('staff', 'name')
                            ->disabled(),

                        TextInput::make('subject')
                            ->label('Subjek')
                            ->disabled(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'open' => 'Open',
                                'closed' => 'Closed',
                            ])
                            ->disabled(),
                    ])
                    ->columns(2),
            ]);
    }
}
