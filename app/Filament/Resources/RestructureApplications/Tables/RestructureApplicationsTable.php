<?php

namespace App\Filament\Resources\RestructureApplications\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\LoanApplication;

class RestructureApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('loan_application_id')->label('ID')->sortable(),
            TextColumn::make('member.full_name')->label('Member'),
            TextColumn::make('type.name')->label('Loan Type'),
            TextColumn::make('amount_requested')->money('PHP'),
            TextColumn::make('totalPaid')
                    ->label('Principal Paid')
                    ->getStateUsing(fn($record) => $record->totalPaid())
                    ->sortable(),
            TextColumn::make('term_months')->label('Term'),
            BadgeColumn::make('status')
                ->colors([
                    'warning' => 'Pending',
                    'success' => 'Approved',
                    'danger' => 'Rejected',
                ]),
        ]);
    }
}