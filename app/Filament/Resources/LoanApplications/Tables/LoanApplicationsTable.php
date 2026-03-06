<?php


namespace App\Filament\Resources\LoanApplications\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\Action;
use App\Models\LoanApplicationStatusLog;
use App\Models\LoanAccount;
use Filament\Notifications\Notification;

class LoanApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('loan_application_id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('member.member_no')
                    ->label('Member'),

                TextColumn::make('type.name')
                    ->label('Loan Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('amount_requested')
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
            ->filters([
                //
            ])
            ->actions([
                Action::make('underReview')
                    ->label('Mark Under Review')
                    ->visible(fn ($record) => $record->status === 'Pending')
                    ->action(function ($record) {
                        $from = $record->status;
                        $record->update(['status' => 'Under Review']);
                        LoanApplicationStatusLog::create([
                            'loan_application_id' => $record->loan_application_id,
                            'from_status' => $from,
                            'to_status' => 'Under Review',
                            'changed_by_user_id' => auth()->id(),
                            'changed_at' => now(),
                        ]);
                        Notification::make()->title('Marked Under Review')->success()->send();
                    }),

                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
                    ->action(function ($record) {
                        if ($record->approved_at) {
                            Notification::make()->title('Already approved')->warning()->send();
                            return;
                        }

                        $principal = (float) $record->amount_requested;
                        $term = (int) $record->term_months;
                        $interestRate = (float) ($record->type?->max_interest_rate ?? 0);

                        $release = now()->toDateString();
                        $maturity = now()->addMonths($term)->toDateString();

                        $monthlyPrincipal = $term > 0 ? ($principal / $term) : $principal;
                        $firstMonthInterest = $principal * ($interestRate / 100) / 12;
                        $monthlyAmort = $monthlyPrincipal + $firstMonthInterest;

                        LoanAccount::create([
                            'loan_application_id' => $record->loan_application_id,
                            'principal_amount' => $principal,
                            'interest_rate' => $interestRate,
                            'term_months' => $term,
                            'release_date' => $release,
                            'maturity_date' => $maturity,
                            'monthly_amortization' => $monthlyAmort,
                            'balance' => $principal,
                            'status' => 'Active',
                        ]);

                        $from = $record->status;
                        $record->update([
                            'status' => 'Approved',
                            'approved_at' => now(),
                        ]);

                        LoanApplicationStatusLog::create([
                            'loan_application_id' => $record->loan_application_id,
                            'from_status' => $from,
                            'to_status' => 'Approved',
                            'changed_by_user_id' => auth()->id(),
                            'changed_at' => now(),
                        ]);

                        Notification::make()->title('Approved & Loan Account created')->success()->send();
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
                    ->form([
                        \Filament\Forms\Components\Textarea::make('reason')->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $from = $record->status;
                        $record->update(['status' => 'Rejected']);

                        LoanApplicationStatusLog::create([
                            'loan_application_id' => $record->loan_application_id,
                            'from_status' => $from,
                            'to_status' => 'Rejected',
                            'changed_by_user_id' => auth()->id(),
                            'reason' => $data['reason'],
                            'changed_at' => now(),
                        ]);

                        Notification::make()->title('Rejected')->success()->send();
                    }),

                Action::make('cancel')
                    ->label('Cancel')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
                    ->action(function ($record) {
                        $from = $record->status;
                        $record->update(['status' => 'Cancelled']);

                        LoanApplicationStatusLog::create([
                            'loan_application_id' => $record->loan_application_id,
                            'from_status' => $from,
                            'to_status' => 'Cancelled',
                            'changed_by_user_id' => auth()->id(),
                            'changed_at' => now(),
                        ]);

                        Notification::make()->title('Cancelled')->success()->send();
                    }),
            ])
            ->bulkActions([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }
}