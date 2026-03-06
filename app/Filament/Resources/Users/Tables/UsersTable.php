<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('coop_id')
                    ->label('Coop ID')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('username')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('profile.full_name')
                    ->label('Profile Name')
                    ->searchable()
                    ->sortable(),

                // QR Code preview in table
                ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->disk('public')
                    ->width(70)
                    ->height(70),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Print QR Code
                Action::make('print_qr')
                    ->label('Print QR')
                    ->icon('heroicon-o-printer')
                    ->color('gray')
                    ->modalHeading(fn ($record) => $record->username . ' — QR Code')
                    ->modalContent(function ($record): HtmlString {
                        if (!$record->qr_code) {
                            return new HtmlString('
                                <div style="text-align:center; padding:2rem; color:#94a3b8;">
                                    No QR Code available for this user.
                                </div>
                            ');
                        }

                        $url     = Storage::url($record->qr_code);
                        $userId  = str_pad($record->user_id, 5, '0', STR_PAD_LEFT);
                        $username = $record->username;
                        $profile  = $record->profile->full_name ?? 'N/A';
                        $coopId   = $record->coop_id ?? 'N/A';

                        return new HtmlString("
                            <div id='qr-print-area' style='
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                gap: 1rem;
                                padding: 1.5rem;
                                font-family: sans-serif;
                            '>
                                <img src='{$url}'
                                     width='260'
                                     height='260'
                                     style='border-radius:12px; border:2px solid #e2e8f0; padding:10px; box-shadow:0 4px 24px rgba(0,0,0,.08);' />

                                <div style='text-align:center; line-height:1.8; color:#334155; font-size:.9rem;'>
                                    <div><strong>User ID:</strong> #{$userId}</div>
                                    <div><strong>Username:</strong> {$username}</div>
                                    <div><strong>Profile:</strong> {$profile}</div>
                                    <div><strong>Coop ID:</strong> {$coopId}</div>
                                    <div style='color:#16a34a; font-weight:700;'>Status: Active</div>
                                </div>

                                <button onclick=\"
                                    var win = window.open('', '_blank');
                                    win.document.write('<html><head><title>QR Code - {$username}</title>');
                                    win.document.write('<style>');
                                    win.document.write('body { display:flex; flex-direction:column; align-items:center; justify-content:center; min-height:100vh; margin:0; font-family:sans-serif; }');
                                    win.document.write('.card { border:1px solid #e2e8f0; border-radius:16px; padding:2rem; text-align:center; box-shadow:0 4px 24px rgba(0,0,0,.08); }');
                                    win.document.write('img { width:260px; height:260px; border-radius:8px; border:2px solid #e2e8f0; padding:8px; }');
                                    win.document.write('.info { margin-top:1rem; line-height:2; color:#334155; font-size:.95rem; }');
                                    win.document.write('.status { color:#16a34a; font-weight:700; }');
                                    win.document.write('</style></head><body>');
                                    win.document.write('<div class=\\'card\\'>');
                                    win.document.write('<img src=\\'{$url}\\' />');
                                    win.document.write('<div class=\\'info\\'>');
                                    win.document.write('<div><strong>User ID:</strong> #{$userId}</div>');
                                    win.document.write('<div><strong>Username:</strong> {$username}</div>');
                                    win.document.write('<div><strong>Profile:</strong> {$profile}</div>');
                                    win.document.write('<div><strong>Coop ID:</strong> {$coopId}</div>');
                                    win.document.write('<div class=\\'status\\'>Status: Active</div>');
                                    win.document.write('</div></div>');
                                    win.document.write('</body></html>');
                                    win.document.close();
                                    win.focus();
                                    win.print();
                                    win.close();
                                \"
                                style='
                                    background:#0d9488;
                                    color:#fff;
                                    padding:.6rem 1.5rem;
                                    border-radius:99px;
                                    font-size:.85rem;
                                    font-weight:600;
                                    border:none;
                                    cursor:pointer;
                                '>
                                    Print QR Code
                                </button>
                            </div>
                        ");
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Close'),

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}