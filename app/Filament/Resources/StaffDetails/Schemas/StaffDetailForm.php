<?php

namespace App\Filament\Resources\StaffDetails\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;

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
                    ->relationship(
                        name: 'profile',
                        titleAttribute: 'email',
                        modifyQueryUsing: function ($query) {
                            $user = auth()->user();

                            if (! $user || $user->hasRole('Admin')) {
                                return $query;
                            }

                            // Only allow profiles that:
                            // 1. Do NOT already have a staffDetail
                            // 2. Belong to this branch (if already assigned)

                            return $query->where(function ($q) use ($user) {
                                $q->whereDoesntHave('staffDetail')
                                ->orWhereHas('staffDetail', fn ($sq) =>
                                        $sq->where('branch_id', $user->branchId())
                                );
                            });
                        }
                    )
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
                    ->required()
                    ->visible(fn () => auth()->user()?->hasRole('Admin')) // only Admin can choose
                    ->dehydrated(fn () => auth()->user()?->hasRole('Admin') ?? false),

                Hidden::make('branch_id')
                    ->default(fn () => auth()->user()?->branchId())
                    ->visible(fn () => ! auth()->user()?->hasRole('Admin'))
                    ->dehydrated(fn () => ! auth()->user()?->hasRole('Admin')),

                TextInput::make('staff_detailscol')
                    ->label('Additional Details')
                    ->maxLength(45),
            ])
            ->columns(2),
            ]);
    }
}
