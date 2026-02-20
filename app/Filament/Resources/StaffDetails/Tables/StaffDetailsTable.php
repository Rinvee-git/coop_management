<?php

namespace App\Filament\Resources\StaffDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
class StaffDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('staff_id')
                ->label('ID')
                ->sortable(),

                TextColumn::make('profile.full_name')
                    ->label('Staff Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('profile.email')
                    ->label('Login Email')
                    ->searchable(),

                TextColumn::make('position')
                    ->sortable(),

                TextColumn::make('branch.name')
                    ->label('Branch')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('staff_id', 'desc')
            
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
