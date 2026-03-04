<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    protected $primaryKey = 'member_id';


    protected $fillable = [
        'profile_id',
        'membership_type_id',
        'branch_id',
        'signature_path',
        'member_no',
        'employment_info',
        'monthly_income',
        'occupation',
        'employer_name',
        'monthly_income_range',
        'id_type',
        'id_number',
        'emergency_full_name',
        'emergency_phone',
        'emergency_relationship',
        'status',
        'share_capital_balance',
        'regular_at',
    ];

    protected $casts = [
        'share_capital_balance' => 'decimal:2',
        'regular_at' => 'datetime',
    ];

        public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'profile_id');
    }

    public function membershipType()
    {
        return $this->belongsTo(MembershipType::class, 'membership_type_id', 'membership_type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'branch_id');
    }

    public function isRegular(): bool
    {
        return ! is_null($this->regular_at);
    }

    public function membershipStatus(): string
    {
        return $this->isRegular() ? 'Regular' : 'Associate';
    }
}
