<?php

namespace App\Filament\Resources\StaffDetails\Pages;

use App\Filament\Resources\StaffDetails\StaffDetailResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStaffDetail extends EditRecord
{
    protected static string $resource = StaffDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
