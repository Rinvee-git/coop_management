<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
        FileUpload::make('avatar')
                    ->label('Profile Picture')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->nullable(),
        TextInput::make('username')
            ->maxLength(45)
            ->required(),

        TextInput::make('password')
            ->password()
            ->maxLength(255) // UI-side; DB is still 45 unless you migrate it
            ->dehydrateStateUsing(fn (?string $state) => filled($state) ? Hash::make($state) : null)
            ->dehydrated(fn (?string $state) => filled($state))
            ->required(fn (string $operation) => $operation === 'create'),

        Select::make('profile_id')
            ->required()
            ->relationship('profile', 'profile_id')
            ->getOptionLabelFromRecordUsing(fn (Profile $record) => $record->full_name),
            ]);
    }
}
