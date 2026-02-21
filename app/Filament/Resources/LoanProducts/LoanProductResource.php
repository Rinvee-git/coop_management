<?php

namespace App\Filament\Resources\LoanProducts;

use App\Filament\Resources\LoanProducts\Pages\CreateLoanProduct;
use App\Filament\Resources\LoanProducts\Pages\EditLoanProduct;
use App\Filament\Resources\LoanProducts\Pages\ListLoanProducts;
use App\Filament\Resources\LoanProducts\Schemas\LoanProductForm;
use App\Filament\Resources\LoanProducts\Tables\LoanProductsTable;
use App\Models\LoanProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;




class LoanProductResource extends Resource
{
    protected static ?string $model = LoanProduct::class;

    protected static ?string $navigationLabel = 'Load Management';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $recordTitleAttribute = 'no';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(150),

                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('interest_rate')
                    ->numeric()
                    ->suffix('%')
                    ->required(),

                Select::make('interest_type')
                    ->options([
                        'Annuity' => 'Annuity',
                        'Diminishing' => 'Diminishing',
                    ])
                    ->required(),

                TextInput::make('min_amount')
                    ->numeric()
                    ->prefix('₱')
                    ->required(),

                TextInput::make('max_amount')
                    ->numeric()
                    ->prefix('₱')
                    ->required(),

                TextInput::make('min_term_months')
                    ->numeric()
                    ->required(),

                TextInput::make('max_term_months')
                    ->numeric()
                    ->required(),

                Toggle::make('requires_collateral')
                    ->label('Requires Collateral'),

                Toggle::make('is_active')
                    ->default(true),
            ])
            ->columns(2);
    }

      public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('interest_rate')
                    ->suffix('%')
                    ->sortable(),

                TextColumn::make('interest_type'),

                TextColumn::make('min_amount')
                    ->money('PHP')
                    ->label('Min Amount'),

                TextColumn::make('max_amount')
                    ->money('PHP')
                    ->label('Max Amount'),

                IconColumn::make('requires_collateral')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc');
    }
    
    public static function getPluralLabel(): string
        {
    return 'Loan Application';
        }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLoanProducts::route('/'),
            'create' => CreateLoanProduct::route('/create'),
            'edit' => EditLoanProduct::route('/{record}/edit'),
        ];
    }
}
