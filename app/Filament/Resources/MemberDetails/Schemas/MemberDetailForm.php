<?php

namespace App\Filament\Resources\MemberDetails\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;

class MemberDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make('Membership Info')
                ->schema([
                    TextInput::make('member_no')
                        ->label('Member Number'),

                    Select::make('membership_type_id')
                        ->relationship('membershipType', 'name')
                        ->label('Membership Type')
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
                ])->columns(2),

            Section::make('Employment')
                ->schema([
                    TextInput::make('occupation'),
                    TextInput::make('employer_name'),
                    TextInput::make('monthly_income_range'),
                ])->columns(3),

            Section::make('Identification')
                ->schema([
                    TextInput::make('id_type'),
                    TextInput::make('id_number'),
                ])->columns(2),

            Section::make('Emergency Contact')
                ->schema([
                    TextInput::make('emergency_full_name'),
                    TextInput::make('emergency_phone'),
                    TextInput::make('emergency_relationship'),
                ])->columns(3),

            Section::make('Digital Signature')
                ->schema([
                    FileUpload::make('signature_path')
                    ->label('Signature (upload for now)')
                    ->directory('signatures')
                    ->image()

                ]),
            ]);
    }
}
