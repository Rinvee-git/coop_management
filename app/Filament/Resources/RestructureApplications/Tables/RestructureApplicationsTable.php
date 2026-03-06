<?php

namespace App\Filament\Resources\RestructureApplications\Tables;

<<<<<<< HEAD
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
=======
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\LoanApplication;
>>>>>>> main

class RestructureApplicationsTable
{
    public static function configure(Table $table): Table
    {
<<<<<<< HEAD
        return $table
            ->columns([
                //
            ])
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
=======
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
>>>>>>> main
