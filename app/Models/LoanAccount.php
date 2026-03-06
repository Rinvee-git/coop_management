<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
     protected $primaryKey = 'loan_account_id';

    protected $fillable = [
        'loan_application_id',
        'principal_amount',
        'interest_rate',
        'term_months',
        'release_date',
        'maturity_date',
        'monthly_amortization',
        'balance',
        'status',
    ];

    protected $casts = [
        'principal_amount' => 'decimal:2',
        'monthly_amortization' => 'decimal:2',
        'balance' => 'decimal:2',
        'release_date' => 'date',
        'maturity_date' => 'date',
    ];
}
