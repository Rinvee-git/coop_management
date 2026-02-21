<?php

namespace App\Filament\Resources\LoanApplications;

use App\Models\LoanApplication;
use App\Models\LoanProduct;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\LoanApplications\Pages;

class LoanApplicationResource extends Resource
{
    protected static ?string $model = LoanApplication::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

      protected static ?string $navigationLabel = 'Loan Applications';

    protected static ?string $recordTitleAttribute = 'loan_application_id';

   public static function form(Schema $schema): Schema
{
    return $schema
        ->components([

            Select::make('member_id')
                ->relationship('member', 'member_no')
                ->searchable()
                ->required(),

            Select::make('loan_product_id')
                ->relationship('product', 'name')
                ->searchable()
                ->required()
                ->reactive(),

            TextInput::make('amount')
                ->numeric()
                ->required()
                ->rules(function (callable $get) {
                    $productId = $get('loan_product_id');
                    if (!$productId) return [];

                    $product = \App\Models\LoanProduct::find($productId);
                    if (!$product) return [];

                    return [
                        "min:{$product->min_amount}",
                        "max:{$product->max_amount}",
                    ];
                })
                ->helperText(function (callable $get) {
                    $productId = $get('loan_product_id');
                    if (!$productId) return null;

                    $product = \App\Models\LoanProduct::find($productId);
                    if (!$product) return null;

                    return "Allowed: ₱{$product->min_amount} - ₱{$product->max_amount}";
                }),

            TextInput::make('term_months')
                ->numeric()
                ->required()
                ->rules(function (callable $get) {
                    $productId = $get('loan_product_id');
                    if (!$productId) return [];

                    $product = \App\Models\LoanProduct::find($productId);
                    if (!$product) return [];

                    return [
                        "min:{$product->min_term_months}",
                        "max:{$product->max_term_months}",
                    ];
                })
                ->helperText(function (callable $get) {
                    $productId = $get('loan_product_id');
                    if (!$productId) return null;

                    $product = \App\Models\LoanProduct::find($productId);
                    if (!$product) return null;

                    return "Allowed: {$product->min_term_months} - {$product->max_term_months} months";
                }),

            TextInput::make('interest_rate')
                ->numeric()
                ->suffix('%')
                ->required()
                ->disabled()
                ->dehydrated(),

            Select::make('status')
                ->options([
                    'Pending' => 'Pending',
                    'Approved' => 'Approved',
                    'Rejected' => 'Rejected',
                    'Released' => 'Released',
                    'Completed' => 'Completed',
                ])
                ->default('Pending')
                ->required(),

            Textarea::make('remarks')
                ->columnSpanFull(),
        ])
        ->columns(2);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('loan_application_id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('member.member_no')
                    ->label('Member'),

                TextColumn::make('product.name')
                    ->label('Product'),

                TextColumn::make('amount')
                    ->money('PHP'),

                TextColumn::make('term_months')
                    ->label('Term'),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Pending',
                        'success' => 'Approved',
                        'danger' => 'Rejected',
                        'info' => 'Released',
                        'primary' => 'Completed',
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoanApplications::route('/'),
            'create' => Pages\CreateLoanApplication::route('/create'),
            'edit' => Pages\EditLoanApplication::route('/{record}/edit'),
        ];
    }
}