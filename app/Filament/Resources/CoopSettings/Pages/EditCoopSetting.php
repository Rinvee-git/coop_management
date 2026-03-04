<?php

namespace App\Filament\Resources\CoopSettings\Pages;

use App\Filament\Resources\CoopSettings\CoopSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCoopSetting extends EditRecord
{
    protected static string $resource = CoopSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
