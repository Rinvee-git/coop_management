<?php

namespace App\Filament\Resources\LoanApplications\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class LoanApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('member_id')
                    ->label('Member')
                    ->relationship('member', 'id', fn ($query) => $query->where('status', 'Active')->with('profile'))
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->profile->full_name . ' — ' . $record->member_no)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('loan_type_id')
                    ->label('Loan Type')
                    ->relationship('type', 'name', fn ($query) => $query->where('is_active', true))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive(),

                TextInput::make('amount_requested')
                    ->numeric()
                    ->required()
                    ->rules(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return [];

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return [];

                        $rules = [];
                        if (! is_null($type->min_amount)) $rules[] = "min:{$type->min_amount}";
                        if (! is_null($type->max_amount)) $rules[] = "max:{$type->max_amount}";
                        return $rules;
                    })
                    ->helperText(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return null;

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return null;

                        return "Allowed: ₱{$type->min_amount} - ₱{$type->max_amount}";
                    }),

                TextInput::make('term_months')
                    ->numeric()
                    ->required()
                    ->rules(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return [];

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return [];

                        return [
                            "min:1",
                            "max:{$type->max_term_months}",
                        ];
                    })
                    ->helperText(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return null;

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return null;

                        return "Max term: {$type->max_term_months} months";
                    }),

                TextInput::make('interest_rate_display')
                    ->label('Interest Rate')
                    ->disabled()
                    ->dehydrated(false)
                    ->formatStateUsing(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return null;

                        $type = \App\Models\LoanType::find($typeId);
                        return $type ? ("Up to {$type->max_interest_rate}%") : null;
                    }),

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
}