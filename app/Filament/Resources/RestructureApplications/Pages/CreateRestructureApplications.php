<?php

namespace App\Filament\Resources\RestructureApplications\Pages;

use App\Filament\Resources\RestructureApplications\RestructureApplicationsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRestructureApplications extends CreateRecord
{
    protected static string $resource = RestructureApplicationsResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('edit', ['record' => $this->record]);
}
}
