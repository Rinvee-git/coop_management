<?php

namespace App\Filament\Resources\WhatsNews\Pages;

use App\Filament\Resources\WhatsNews\WhatsNewResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWhatsNews extends ListRecords
{
    protected static string $resource = WhatsNewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Create Whats New'),
        ];
    }
}
