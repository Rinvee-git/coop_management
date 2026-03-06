<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestructureApplication extends Model
{
    protected $table = 'restructure_applications';
    protected $primaryKey = 'restructure_application_id';
    protected $fillable = [
        'loan_application_id',
        'status',
        'new_loan_amount',
        'new_maturity_date',
        // add other fields
    ];
        // Add this relationship:
    public function member()
    {
        return $this->belongsTo(MemberDetail::class, 'member_id', 'id');
    }

    // If you want the loan:
    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id', 'loan_application_id');
    }
    /**
     * Get the loan payments for this restructure's loan application.
     */
    public function loanPayments(): HasMany
    {
        return $this->hasMany(LoanPayment::class, 'loan_application_id', 'loan_application_id');
    }
}