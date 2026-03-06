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
<<<<<<< HEAD
                    ->searchable()
                    ->sortable(),

=======
                ->searchable()
                ->sortable(),
<<<<<<< HEAD
>>>>>>> f8e17555d7b729e86b6adf0ed170e6030b3ea405
=======
>>>>>>> main
                TextColumn::make('profile.full_name')
                    ->label('Profile Name')
                    ->searchable()
                    ->sortable(),


                ImageColumn::make('qr_code')
                    ->label('QR Code')
                    ->disk('public')
                    ->width(80)
                    ->height(80),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Click to enlarge QR Code
                Action::make('enlarge_qr')
                    ->label('Print QR')
                    ->icon('heroicon-o-magnifying-glass-plus')
                    ->color('gray')
                    ->modalHeading(fn ($record) => $record->username . ' — QR Code')
                    ->modalContent(function ($record): HtmlString {
                        if (!$record->qr_code) {
                            return new HtmlString('
                                <div style="text-align:center; padding:2rem; color:#94a3b8;">
                                    No QR Code available.
                                </div>
                            ');
                        }

                        $url = Storage::url($record->qr_code);

                        return new HtmlString("
                            <div style='display:flex; flex-direction:column; align-items:center; gap:1rem; padding:1.5rem;'>
                                <img src='{$url}'
                                     width='300'
                                     height='300'
                                     style='border-radius:12px; border:2px solid #e2e8f0; padding:12px; box-shadow:0 4px 24px rgba(0,0,0,.1);' />
                                <a href='{$url}'
                                   download='qrcode_{$record->username}.svg'
                                   style='background:#0d9488; color:#fff; padding:.5rem 1.25rem; border-radius:99px; font-size:.85rem; text-decoration:none; font-weight:600;'>
                                    Download QR Code
                                </a>
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