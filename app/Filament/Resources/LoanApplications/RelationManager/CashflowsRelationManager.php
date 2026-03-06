<?php

namespace App\Filament\Resources\LoanApplications\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class CashflowsRelationManager extends RelationManager
{
    protected static string $relationship = 'cashflows';

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $form->schema([
            Select::make('row_type')
                ->label('Type')
                ->options([
                    'income' => 'Income',
                    'expense' => 'Expense',
                    'debt' => 'Debt',
                ])
                ->required(),

            TextInput::make('label')
                ->required()
                ->maxLength(150),

            TextInput::make('amount')
                ->numeric()
                ->minValue(0.01)
                ->required(),

            Textarea::make('notes')
                ->rows(2)
                ->columnSpanFull(),
        ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('row_type')->badge()->label('Type'),
                TextColumn::make('label')->label('Label')->searchable(),
                TextColumn::make('amount')->numeric(2)->label('Amount'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}