<?php

namespace App\Filament\Resources\StaffDetails;

use App\Filament\Resources\StaffDetails\Pages\CreateStaffDetail;
use App\Filament\Resources\StaffDetails\Pages\EditStaffDetail;
use App\Filament\Resources\StaffDetails\Pages\ListStaffDetails;
use App\Filament\Resources\StaffDetails\Schemas\StaffDetailForm;
use App\Filament\Resources\StaffDetails\Tables\StaffDetailsTable;
use App\Models\StaffDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StaffDetailResource extends Resource
{
    protected static ?string $model = StaffDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return StaffDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffDetailsTable::configure($table);
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
            'index' => ListStaffDetails::route('/'),
            'create' => CreateStaffDetail::route('/create'),
            'edit' => EditStaffDetail::route('/{record}/edit'),
        ];
    }
}
