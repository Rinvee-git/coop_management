<?php

namespace App\Filament\Resources\StaffDetails\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class StaffDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Staff Information')
            ->schema([

                Select::make('profile_id')
                    ->label('Profile')
                    ->relationship('profile', 'email')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => $record->full_name . ' — ' . $record->email
                    )
                    ->required(),

                TextInput::make('position')
                    ->label('Position')
                    ->required()
                    ->maxLength(45),

                Select::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('staff_detailscol')
                    ->label('Additional Details')
                    ->maxLength(45),
            ])
            ->columns(2),
            ]);
    }
}
