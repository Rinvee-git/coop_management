<?php

namespace App\Filament\Resources\RestructureApplications\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\LoanApplication;
use App\Models\MemberDetail;
use App\Models\LoanType;

class RestructureApplicationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('old_loan_application_id')
                ->label('Select Existing Loan')
                ->options(function () {
                    // Only show loans eligible for restructure (>50% paid)
                    return LoanApplication::all()
                        ->filter(function ($loan) {
                            $paid = $loan->amount_requested - $loan->balance;
                            return $paid >= ($loan->amount_requested * 0.5);
                        })
                        ->pluck('loan_application_id', 'loan_application_id');
                })
                ->required()
                ->reactive(),

            Select::make('member_id')
                ->label('Member')
                ->options(MemberDetail::where('status', 'Active')
                    ->get()
                    ->pluck('member_no', 'id'))
                ->searchable()
                ->required(),

            Select::make('loan_type_id')
                ->label('Loan Type')
                ->options(LoanType::where('is_active', true)->pluck('name', 'loan_type_id'))
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
