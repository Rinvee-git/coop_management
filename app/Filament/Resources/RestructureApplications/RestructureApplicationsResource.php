<?php

namespace App\Filament\Resources\RestructureApplications;

use App\Filament\Resources\RestructureApplications\Pages\CreateRestructureApplications;
use App\Filament\Resources\RestructureApplications\Pages\EditRestructureApplications;
use App\Filament\Resources\RestructureApplications\Pages\ListRestructureApplications;
use App\Filament\Resources\RestructureApplications\Schemas\RestructureApplicationsForm;
use App\Filament\Resources\RestructureApplications\Tables\RestructureApplicationsTable;
use App\Models\RestructureApplications;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\LoanApplication;
use Illuminate\Database\Eloquent\Builder;

class RestructureApplicationsResource extends Resource
{
    protected static ?string $model = LoanApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Restructure Applications';

    protected static ?string $recordTitleAttribute = 'loan_application_id';
    protected static string|\UnitEnum|null $navigationGroup = 'Loan Management';

     public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('application_type', 'Restructure');
    }

    public static function form(Schema $schema): Schema
    {
        return RestructureApplicationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RestructureApplicationsTable::configure($table);
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
            'index' => ListRestructureApplications::route('/'),
            'create' => CreateRestructureApplications::route('/create'),
            'edit' => EditRestructureApplications::route('/{record}/edit'),
        ];
    }
}
