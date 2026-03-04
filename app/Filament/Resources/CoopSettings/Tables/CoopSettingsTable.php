<?php

namespace App\Filament\Resources\CoopSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CoopSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
        TextColumn::make('key')
            ->label('Key')
            ->searchable(),
        TextColumn::make('value')
            ->label('Value'),
        TextColumn::make('updated_at')
            ->label('Updated')
            ->dateTime(),
    ])
    ->actions([
        EditAction::make(),
    ])
    ->bulkActions([])
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
