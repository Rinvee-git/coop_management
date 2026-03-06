<?php

namespace App\Filament\Resources\RestructureApplications;

use App\Models\LoanPayment;
use App\Filament\Resources\RestructureApplications\Pages\CreateRestructureApplications;
use App\Filament\Resources\RestructureApplications\Pages\EditRestructureApplications;
use App\Filament\Resources\RestructureApplications\Pages\ListRestructureApplications;
use App\Filament\Resources\RestructureApplications\Schemas\RestructureApplicationsForm;
use App\Filament\Resources\RestructureApplications\Tables\RestructureApplicationsTable;
use App\Models\RestructureApplication;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use BackedEnum;
use Filament\Forms\Components\Select;
use App\Models\MemberDetail;

use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RestructureApplicationsResource extends Resource
{
    protected static ?string $model = RestructureApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Restructure Applications';
    protected static string|\UnitEnum|null $navigationGroup = 'Loan Management';
    protected static ?string $recordTitleAttribute = 'restructure_application_id';
    public static function form(Schema $schema): Schema
    {
        return RestructureApplicationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RestructureApplicationsTable::configure($table);
    }


 
public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery();
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestructureApplications::route('/'),
            'create' => Pages\CreateRestructureApplications::route('/create'),
            'edit' => Pages\EditRestructureApplications::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers here if needed
        ];
    }
}