<?php

namespace App\Filament\Resources\CoopSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
class CoopSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Setting')
                ->schema([
                    // MVP: we hard-set the key for this screen
                    Hidden::make('key')
                        ->default('share_capital_regular_threshold')
                        ->dehydrated(true),

                    TextInput::make('value')
                        ->label('Regular Share Capital Threshold')
                        ->numeric()
                        ->minValue(0)
                        ->required()
                        ->helperText('Example: 5000'),
                ])
                ->columns(1),
            ]);
    }
}
