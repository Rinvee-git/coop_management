<?php

namespace App\Filament\Resources\WhatsNews;

use App\Filament\Resources\WhatsNews\Pages\CreateWhatsNew;
use App\Filament\Resources\WhatsNews\Pages\EditWhatsNew;
use App\Filament\Resources\WhatsNews\Pages\ListWhatsNews;
use App\Filament\Resources\WhatsNews\Schemas\WhatsNewForm;
use App\Filament\Resources\WhatsNews\Tables\WhatsNewsTable;
use App\Models\WhatsNew;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WhatsNewResource extends Resource
{
    protected static ?string $model = WhatsNew::class;

    protected static ?string $navigationLabel = "What's New";

    protected static ?string $pluralModelLabel = "What's New";

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WhatsNewForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WhatsNewsTable::configure($table);
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
            'index' => ListWhatsNews::route('/'),
            'create' => CreateWhatsNew::route('/create'),
            'edit' => EditWhatsNew::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
