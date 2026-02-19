<?php

namespace App\Filament\Resources\MemberDetails;

use App\Filament\Resources\MemberDetails\Pages\CreateMemberDetail;
use App\Filament\Resources\MemberDetails\Pages\EditMemberDetail;
use App\Filament\Resources\MemberDetails\Pages\ListMemberDetails;
use App\Filament\Resources\MemberDetails\Pages\ViewMemberDetail;
use App\Filament\Resources\MemberDetails\Schemas\MemberDetailForm;
use App\Filament\Resources\MemberDetails\Schemas\MemberDetailInfolist;
use App\Filament\Resources\MemberDetails\Tables\MemberDetailsTable;
use App\Models\MemberDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MemberDetailResource extends Resource
{
    protected static ?string $model = MemberDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return MemberDetailForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MemberDetailInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MemberDetailsTable::configure($table);
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
            'index' => ListMemberDetails::route('/'),
            'create' => CreateMemberDetail::route('/create'),
            'view' => ViewMemberDetail::route('/{record}'),
            'edit' => EditMemberDetail::route('/{record}/edit'),
        ];
    }
}
