<?php

namespace App\Filament\Resources\MemberDetails\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class MemberDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make('Member + Membership Info')
            ->schema([
                Select::make('profile_id')
                    ->label('Profile')
                    ->relationship('profile', 'email')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name . ' — ' . $record->email)
                    ->required(),

                TextInput::make('member_no')
                    ->label('Member No.')
                    ->maxLength(45),

                Select::make('membership_type_id')
                    ->label('Membership Type')
                    ->relationship('membershipType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                    Select::make('branch_id')
                        ->relationship('branch', 'name')
                        ->default(fn () => auth()->user()?->branchId())
                        ->disabled(fn () => auth()->user()?->isStaff())
                        ->required(),

                Select::make('status')
                    ->options([
                        'Active' => 'Active',
                        'Inactive' => 'Inactive',
                        'Delinquent' => 'Delinquent',
                    ])
                    ->required(),
            ])
            ->columns(2),

        Section::make('Employment')
    ->schema([
        TextInput::make('employment_info'),
        TextInput::make('monthly_income'),
        TextInput::make('occupation'),
        TextInput::make('employer_name'),
        TextInput::make('monthly_income_range'),
    ])
    ->columns(3),

Section::make('Identification')
    ->schema([
        TextInput::make('id_type'),
        TextInput::make('id_number'),
    ]),

Section::make('Emergency Contact')
    ->schema([
        TextInput::make('emergency_full_name'),
        TextInput::make('emergency_phone'),
        TextInput::make('emergency_relationship'),
    ]),

Section::make('Signature')
    ->schema([
        FileUpload::make('signature_path'),
    ]),
            ]);
    }
}
