<?php

namespace App\Filament\Resources\LoanApplications\Pages;

use App\Filament\Resources\LoanApplications\LoanApplicationsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\LoanProductRequirement;
use Illuminate\Support\Carbon;

class EditLoanApplications extends EditRecord
{
    protected static string $resource = LoanApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('submit')
            ->label('Submit Application')
            ->color('success')
            ->visible(fn () => blank($this->record->submitted_at))
            ->requiresConfirmation()
            ->action(function () {
                // 1) Must have gov ID
                $member = $this->record->member;
                if (! $member?->id_type || ! $member?->id_number) {
                    Notification::make()
                        ->title('Missing Government ID')
                        ->body('Member must have ID Type and ID Number before submitting.')
                        ->danger()
                        ->send();
                    return;
                }

                // 2) Must have required docs
                $required = LoanProductRequirement::query()
                    ->where('loan_product_id', $this->record->loan_product_id)
                    ->where('is_required', true)
                    ->pluck('code')
                    ->all();

                $uploaded = $this->record->documents()->pluck('code')->all();

                $missing = array_values(array_diff($required, $uploaded));
                if (! empty($missing)) {
                    Notification::make()
                        ->title('Missing Requirements')
                        ->body('Please upload: ' . implode(', ', $missing))
                        ->danger()
                        ->send();
                    return;
                }

                // 3) Must have at least 1 income row (simple rule)
                $hasIncome = $this->record->cashflows()->where('row_type', 'income')->exists();
                if (! $hasIncome) {
                    Notification::make()
                        ->title('Cashflow Required')
                        ->body('Add at least one Income row before submitting.')
                        ->danger()
                        ->send();
                    return;
                }

                // 4) Mark submitted
                $this->record->update([
                    'submitted_at' => now(),
                    'status' => 'Pending',
                ]);

                Notification::make()
                    ->title('Application submitted')
                    ->success()
                    ->send();
            }),

        ];
    }
}
