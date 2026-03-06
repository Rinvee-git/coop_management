<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanPayment extends Model
{
    protected $table = 'loan_payments';
    protected $primaryKey = 'loan_payment_id';
    protected $fillable = [
        'loan_account_id',
        'loan_application_id',
        'payment_date',
        'amount_paid',
        'principal_paid',
        'interest_paid',
        'penalty_paid',
        'remaining_balance',
    ];

    public function loanApplication(): BelongsTo
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id', 'loan_application_id');
    }
}