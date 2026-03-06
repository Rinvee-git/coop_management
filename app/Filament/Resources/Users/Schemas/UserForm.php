<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Profile;
use App\Models\User;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Account Details')
                    ->schema([
                        Grid::make(2)->schema([

                            FileUpload::make('avatar')
                                ->label('Profile Picture')
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios(['1:1'])
                                ->disk('public')
                                ->directory('avatars')
                                ->imageCropAspectRatio('1:1')
                                ->imageResizeTargetWidth(300)
                                ->imageResizeTargetHeight(300)
                                ->imagePreviewHeight('250')
                                ->columnSpan(2) // 👈 2 of 5
                                ->nullable(),

                            Grid::make(1)->schema([

                                TextInput::make('username')
                                    ->maxLength(45)
                                    ->required(),

                                TextInput::make('password')
                                    ->password()
                                    ->maxLength(255)
                                    ->dehydrateStateUsing(fn (?string $state) => filled($state) ? Hash::make($state) : null)
                                    ->dehydrated(fn (?string $state) => filled($state))
                                    ->required(fn (string $operation) => $operation === 'create'),

                                Select::make('profile_id')
                                    ->required()
                                    ->label('Profile')
                                    ->options(function ($record) {
                                        $usedProfileIds = User::whereNotNull('profile_id')
                                            ->when(
                                                $record?->profile_id,
                                                fn ($q) => $q->where('profile_id', '!=', $record->profile_id)
                                            )
                                            ->pluck('profile_id')
                                            ->toArray();

                                        return Profile::whereNotIn('profile_id', $usedProfileIds)
                                            ->get()
                                            ->pluck('full_name', 'profile_id');
                                    })
                                    ->searchable(),

                            ])->columnSpan(1), // 👈 3 of 5

                        ]),
                    ]),
            ]);
    }
}