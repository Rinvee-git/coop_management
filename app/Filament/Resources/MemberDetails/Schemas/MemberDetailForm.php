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
                        ->label('Branch')
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
                TextInput::make('occupation')->maxLength(100),
                TextInput::make('employer_name')->maxLength(150),
                TextInput::make('monthly_income_range')->maxLength(50),

                // keep these if you still want them
                Textarea::make('employment_info')
                    ->rows(3)
                    ->columnSpanFull(),

                TextInput::make('monthly_income')
                    ->numeric()
                    ->prefix('₱')
                    ->nullable(),
            ])
            ->columns(3),

            Section::make('Identification')
                ->schema([
                    TextInput::make('id_type')->maxLength(50),
                    TextInput::make('id_number')->maxLength(100),
                ])
                ->columns(2),

            Section::make('Emergency Contact')
                ->schema([
                    TextInput::make('emergency_full_name')->maxLength(150),
                    TextInput::make('emergency_phone')->maxLength(50),
                    TextInput::make('emergency_relationship')->maxLength(50),
                ])
                ->columns(3),

            Section::make('Signature')
                ->schema([
                    // TEMP: upload for now (we’ll swap to drawn signature later)
                    FileUpload::make('signature_path')
                        ->label('Signature (Upload for now)')
                        ->disk('public')
                        ->directory('signatures')
                        ->image()
                        ->imagePreviewHeight('120')
                        ->nullable(),

                ]),
            ]);
    }
}
