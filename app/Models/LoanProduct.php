<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    protected $table = 'loan_products';
    protected $primaryKey = 'loan_product_id';

    protected $fillable = [
        'name',
        'description',
        'interest_rate',
        'interest_type',
        'min_amount',
        'max_amount',
        'min_term_months',
        'max_term_months',
        'requires_collateral',
        'is_active',
    ];
}