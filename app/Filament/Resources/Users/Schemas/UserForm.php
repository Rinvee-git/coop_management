<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
            ->numeric()
            ->required(),

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
            ->relationship('profile', 'profile_id'),
            ]);
    }
}
