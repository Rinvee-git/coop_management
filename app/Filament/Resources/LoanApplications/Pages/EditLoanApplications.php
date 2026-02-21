<?php

namespace App\Filament\Resources\LoanApplications\Pages;

use App\Filament\Resources\LoanApplications\LoanApplicationsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLoanApplications extends EditRecord
{
    protected static string $resource = LoanApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
