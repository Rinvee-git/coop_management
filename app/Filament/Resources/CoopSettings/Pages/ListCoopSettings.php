<?php

namespace App\Filament\Resources\CoopSettings\Pages;

use App\Filament\Resources\CoopSettings\CoopSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCoopSettings extends ListRecords
{
    protected static string $resource = CoopSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
