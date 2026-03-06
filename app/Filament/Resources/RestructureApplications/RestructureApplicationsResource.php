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

use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RestructureApplicationsResource extends Resource
{
    protected static ?string $model = RestructureApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Restructure Applications';
    protected static string|\UnitEnum|null $navigationGroup = 'Loan Management';
    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return RestructureApplicationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RestructureApplicationsTable::configure($table);
    }


    public function loanPayments()
{
    return $this->hasMany(LoanPayment::class, 'loan_application_id', 'loan_application_id');
}
   public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('status', 'approved')
        ->whereHas('loanPayments', function (Builder $query) {
            $query->selectRaw('loan_application_id, SUM(principal_paid) as total_paid')
                  ->groupBy('loan_application_id')
                  ->havingRaw('total_paid >= (SELECT amount_requested FROM loan_applications WHERE loan_applications.loan_application_id = loan_payments.loan_application_id) * 0.5');
        });
}
    public static function getPages(): array
    {
        return [
            'index' => ListRestructureApplications::route('/'),
            'create' => CreateRestructureApplications::route('/create'),
            'edit' => EditRestructureApplications::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers here if needed
        ];
    }
}