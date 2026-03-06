<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $primaryKey = 'loan_application_id';

    protected $fillable = [
   'member_id',
    'loan_type_id',
    'amount_requested',
    'term_months',
    'purpose',
    'status',
    'evaluation_notes',
    'bici_notes',
    'submitted_at',
    'approved_at',
    ];

public function type()
{
    return $this->belongsTo(\App\Models\LoanType::class, 'loan_type_id', 'loan_type_id');
}

<<<<<<< HEAD
=======

>>>>>>> main
    protected $casts = [
        'amount_requested' => 'decimal:2',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
    ];
<<<<<<< HEAD

   public function member()
{
    return $this->belongsTo(\App\Models\MemberDetail::class, 'member_id', 'id');
}
=======
    public function payments()
    {
        return $this->hasMany(LoanPayment::class, 'loan_account_id', 'loan_account_id');
    }
>>>>>>> main

public function totalPaid()
    {
        return $this->payments()->sum('principal_paid');
    }

   public function member()
{
    return $this->belongsTo(\App\Models\MemberDetail::class, 'member_id', 'id');
}

    public function product()
    {
        return $this->belongsTo(LoanProduct::class, 'loan_product_id', 'loan_product_id');
    }

    public function documents()
    {
        return $this->hasMany(LoanApplicationDocument::class, 'loan_application_id', 'loan_application_id');
    }

    public function cashflows()
    {
        return $this->hasMany(LoanApplicationCashflow::class, 'loan_application_id', 'loan_application_id');
    }

    public function statusLogs()
    {
        return $this->hasMany(\App\Models\LoanApplicationStatusLog::class, 'loan_application_id', 'loan_application_id')
            ->orderByDesc('changed_at');
    }
}