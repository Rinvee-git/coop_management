<?php

namespace App\Filament\Resources\LoanProducts\Pages;

use App\Filament\Resources\LoanProducts\LoanProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLoanProduct extends CreateRecord
{
    protected static string $resource = LoanProductResource::class;

    public function getTitle(): string
{
    return 'Application Form';
}
}
