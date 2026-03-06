<?php

namespace App\Filament\Resources\LoanApplications;

use App\Models\LoanApplication;
use App\Models\LoanProduct;
use App\Models\LoanType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\LoanApplications\Pages;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\LoanAccount;
use App\Models\LoanApplicationStatusLog;
use Illuminate\Support\Carbon;

class LoanApplicationsResource extends Resource
{
    protected static ?string $model = LoanApplication::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

      protected static ?string $navigationLabel = 'Loan Applications';

    protected static ?string $recordTitleAttribute = 'loan_application_id';
    protected static string|\UnitEnum|null $navigationGroup = 'Loan Management';

   public static function form(Schema $schema): Schema
{
    return $schema
        ->components([

           Select::make('member_id')
                ->label('Member')
                ->relationship('member', 'id', fn ($query) => $query->where('status', 'Active')->with('profile'))
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->profile->full_name . ' — ' . $record->member_no)
                ->searchable()
                ->preload()
                ->required(),

            Select::make('loan_type_id')
                ->label('Loan Type')
                ->relationship('type', 'name', fn ($query) => $query->where('is_active', true))
                ->searchable()
                ->preload()
                ->required()
                ->reactive(),

            TextInput::make('amount_requested')
                ->numeric()
                ->required()
                ->rules(function (callable $get) {
                    $typeId = $get('loan_type_id');
                    if (! $typeId) return [];

                    $type = \App\Models\LoanType::find($typeId);
                    if (! $type) return [];

                    $rules = [];
                    if (! is_null($type->min_amount)) $rules[] = "min:{$type->min_amount}";
                    if (! is_null($type->max_amount)) $rules[] = "max:{$type->max_amount}";
                    return $rules;
                })
                ->helperText(function (callable $get) {
                    $typeId = $get('loan_type_id');
                    if (! $typeId) return null;

                    $type = \App\Models\LoanType::find($typeId);
                    if (! $type) return null;

                    return "Allowed: ₱{$type->min_amount} - ₱{$type->max_amount}";
                }),

            TextInput::make('term_months')
                    ->numeric()
                    ->required()
                    ->rules(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return [];

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return [];

                        return [
                            "min:1",
                            "max:{$type->max_term_months}",
                        ];
                    })
                    ->helperText(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return null;

                        $type = \App\Models\LoanType::find($typeId);
                        if (! $type) return null;

                        return "Max term: {$type->max_term_months} months";
                    }),

                            TextInput::make('interest_rate_display')
                    ->label('Interest Rate')
                    ->disabled()
                    ->dehydrated(false)
                    ->formatStateUsing(function (callable $get) {
                        $typeId = $get('loan_type_id');
                        if (! $typeId) return null;

                        $type = \App\Models\LoanType::find($typeId);
                        return $type ? ("Up to {$type->max_interest_rate}%") : null;
                    }),

            Select::make('status')
                ->options([
                    'Pending' => 'Pending',
                    'Approved' => 'Approved',
                    'Rejected' => 'Rejected',
                    'Released' => 'Released',
                    'Completed' => 'Completed',
                ])
                ->default('Pending')
                ->required(),

            Textarea::make('remarks')
                ->columnSpanFull(),
        ])
        ->columns(2);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('loan_application_id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('member.member_no')
                    ->label('Member'),

                TextColumn::make('type.name')->label('Loan Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('amount_requested')->money('PHP'),

                TextColumn::make('term_months')
                    ->label('Term Months'),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Pending',
                        'success' => 'Approved',
                        'danger' => 'Rejected',
                        'info' => 'Released',
                        'primary' => 'Completed',
                    ]),
            ])
            ->actions([
             Action::make('underReview')
        ->label('Mark Under Review')
        ->visible(fn ($record) => $record->status === 'Pending')
        ->action(function ($record) {
            $from = $record->status;

            $record->update(['status' => 'Under Review']);

            LoanApplicationStatusLog::create([
                'loan_application_id' => $record->loan_application_id,
                'from_status' => $from,
                'to_status' => 'Under Review',
                'changed_by_user_id' => auth()->id(),
                'changed_at' => now(),
            ]);

            Notification::make()->title('Marked Under Review')->success()->send();
        }),

    Action::make('approve')
        ->label('Approve')
        ->color('success')
        ->requiresConfirmation()
        ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
        ->action(function ($record) {
            if ($record->approved_at) {
                Notification::make()->title('Already approved')->warning()->send();
                return;
            }

            $principal = (float) $record->amount_requested;
            $term = (int) $record->term_months;
            $interestRate = (float) ($record->type?->max_interest_rate ?? 0);

            $release = now()->toDateString();
            $maturity = now()->addMonths($term)->toDateString();

            $monthlyPrincipal = $term > 0 ? ($principal / $term) : $principal;
            $firstMonthInterest = $principal * ($interestRate / 100) / 12;
            $monthlyAmort = $monthlyPrincipal + $firstMonthInterest;

            LoanAccount::create([
                'loan_application_id' => $record->loan_application_id,
                'principal_amount' => $principal,
                'interest_rate' => $interestRate,
                'term_months' => $term,
                'release_date' => $release,
                'maturity_date' => $maturity,
                'monthly_amortization' => $monthlyAmort,
                'balance' => $principal,
                'status' => 'Active',
            ]);

            $from = $record->status;

            $record->update([
                'status' => 'Approved',
                'approved_at' => now(),
            ]);

            LoanApplicationStatusLog::create([
                'loan_application_id' => $record->loan_application_id,
                'from_status' => $from,
                'to_status' => 'Approved',
                'changed_by_user_id' => auth()->id(),
                'changed_at' => now(),
            ]);

            Notification::make()->title('Approved & Loan Account created')->success()->send();
        }),

    Action::make('reject')
        ->label('Reject')
        ->color('danger')
        ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
        ->form([
            \Filament\Forms\Components\Textarea::make('reason')->required(),
        ])
        ->action(function ($record, array $data) {
            $from = $record->status;

            $record->update(['status' => 'Rejected']);

            LoanApplicationStatusLog::create([
                'loan_application_id' => $record->loan_application_id,
                'from_status' => $from,
                'to_status' => 'Rejected',
                'changed_by_user_id' => auth()->id(),
                'reason' => $data['reason'],
                'changed_at' => now(),
            ]);

            Notification::make()->title('Rejected')->success()->send();
        }),

    Action::make('cancel')
        ->label('Cancel')
        ->color('gray')
        ->requiresConfirmation()
        ->visible(fn ($record) => in_array($record->status, ['Pending', 'Under Review'], true))
        ->action(function ($record) {
            $from = $record->status;

            $record->update(['status' => 'Cancelled']);

            LoanApplicationStatusLog::create([
                'loan_application_id' => $record->loan_application_id,
                'from_status' => $from,
                'to_status' => 'Cancelled',
                'changed_by_user_id' => auth()->id(),
                'changed_at' => now(),
            ]);

            Notification::make()->title('Cancelled')->success()->send();
        }),
        ])
        ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoanApplications::route('/'),
            'create' => Pages\CreateLoanApplications::route('/create'),
            'edit' => Pages\EditLoanApplications::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
{
    return [
        \App\Filament\Resources\LoanApplications\RelationManagers\DocumentsRelationManager::class,
        \App\Filament\Resources\LoanApplications\RelationManagers\CashflowsRelationManager::class,
    ];
}
}