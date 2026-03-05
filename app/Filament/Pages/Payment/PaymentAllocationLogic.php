<?php

namespace App\Filament\Pages\Payment;

use Filament\Pages\Page;

class PaymentAllocationLogic extends Page
{
    protected static string|\UnitEnum|null $navigationGroup = 'Payment Management';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string $navigationLabel = 'Payment Allocation Logic';
    protected static ?int $navigationSort = 2;
    protected static ?string $title = 'Payment Allocation Logic';
    protected string $view = 'filament.pages.payment.payment-allocation-logic';
}