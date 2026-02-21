<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $primaryKey = 'loan_application_id';

    protected $fillable = [
        'member_id',
        'loan_product_id',
        'amount',
        'term_months',
        'interest_rate',
        'status',
        'remarks',
    ];

    public function member()
    {
        return $this->belongsTo(MemberDetail::class, 'member_id');
    }

    public function product()
    {
        return $this->belongsTo(LoanProduct::class, 'loan_product_id');
    }
}