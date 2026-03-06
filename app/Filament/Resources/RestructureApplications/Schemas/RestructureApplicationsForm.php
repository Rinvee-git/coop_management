<?php

namespace App\Filament\Resources\RestructureApplications\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\LoanApplication;
use App\Models\LoanType;

class RestructureApplicationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
           Select::make('loan_application_id')
                    ->label('Select Existing Loan')
                    ->options(function () {
                        return LoanApplication::all()
                            ->filter(fn($loan) => $loan->amount_requested - $loan->balance >= $loan->amount_requested * 0.5)
                            ->mapWithKeys(fn($loan) => [
                                $loan->loan_application_id => $loan->name ?? "Loan #{$loan->loan_application_id}"
                            ])
                            ->toArray();
                    })
                    ->required()
                    ->reactive(),

            Select::make('loan_type_id')
                ->label('Loan Type')
                ->options(LoanType::where('is_active', true)
                    ->pluck('name', 'loan_type_id'))
                ->required(),

            TextInput::make('amount_requested')
                ->label('New Loan Amount')
                ->numeric()
                ->required()
                ->helperText('Automatically calculated based on remaining principal + interest'),

            TextInput::make('term_months')
                ->label('Term (months)')
                ->numeric()
                ->required(),

            TextInput::make('interest_rate')
                ->label('Interest Rate (%)')
                ->numeric()
                ->required(),

            Textarea::make('remarks')
                ->label('Remarks')
                ->columnSpanFull(),
        ])->columns(2);
    }
}
