<?php

namespace App\Filament\Pages\Payment;

use Filament\Pages\Page;

class OnlineEWalletPayments extends Page
{
    protected static string|\UnitEnum|null $navigationGroup = 'Payment Management';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-device-phone-mobile';
    protected static ?string $navigationLabel = 'Online & E-Wallet Payments';
    protected static ?int $navigationSort = 3;
    protected static ?string $title = 'Online & E-Wallet Payments';
    protected string $view = 'filament.pages.payment.online-e-wallet-payments';
}