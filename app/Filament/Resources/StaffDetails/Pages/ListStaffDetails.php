<?php

namespace App\Filament\Resources\StaffDetails\Pages;

use App\Filament\Resources\StaffDetails\StaffDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaffDetails extends ListRecords
{
    protected static string $resource = StaffDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
