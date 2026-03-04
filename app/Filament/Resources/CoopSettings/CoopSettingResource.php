<?php

namespace App\Filament\Resources\CoopSettings;

use App\Filament\Resources\CoopSettings\Pages\CreateCoopSetting;
use App\Filament\Resources\CoopSettings\Pages\EditCoopSetting;
use App\Filament\Resources\CoopSettings\Pages\ListCoopSettings;
use App\Filament\Resources\CoopSettings\Schemas\CoopSettingForm;
use App\Filament\Resources\CoopSettings\Tables\CoopSettingsTable;
use App\Models\CoopSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CoopSettingResource extends Resource
{
    protected static ?string $model = CoopSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Share Capital';

    protected static ?string $recordTitleAttribute = 'Name';

    public static function form(Schema $schema): Schema
    {
        return CoopSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoopSettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCoopSettings::route('/'),
            'create' => CreateCoopSetting::route('/create'),
            'edit' => EditCoopSetting::route('/{record}/edit'),
        ];
    }
}
