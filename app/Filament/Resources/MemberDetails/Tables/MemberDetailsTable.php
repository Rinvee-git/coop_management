<?php

namespace App\Filament\Resources\MemberDetails\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class MemberDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('member_id')->label('ID')->sortable(),

            TextColumn::make('profile.full_name')
                ->label('Member')
                ->searchable()
                ->sortable(),

            TextColumn::make('profile.email')
                ->label('Login Email')
                ->searchable(),

            TextColumn::make('membershipType.name')
                ->label('Membership Type')
                ->sortable(),

            TextColumn::make('branch.name')
                ->label('Branch')
                ->sortable(),

            TextColumn::make('status')
                ->badge()
                ->sortable(),

            ImageColumn::make('signature_path')
                ->disk('public')
                ->label('Signature')
                ->height(30)
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('member_id', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
