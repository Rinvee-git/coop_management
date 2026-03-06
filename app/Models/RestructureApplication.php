<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestructureApplication extends Model
{
    protected $table = 'restructure_applications';

    protected $primaryKey = 'restructure_application_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'loan_application_id',
        'status',
        'new_principal',
        'new_interest',
        'new_maturity_date',
        'remarks',
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class, 'loan_application_id', 'loan_application_id');
    }
    public function loanPayments()
{
    return $this->hasMany(
        \App\Models\LoanPayment::class,
        'loan_application_id',
        'loan_application_id'
    );
}
public function totalPaid()
{
    return $this->loanPayments()->sum('principal_paid');
}
public function getTotalPaidAttribute()
{
    return $this->loanPayments()->sum('principal_paid');
}

}