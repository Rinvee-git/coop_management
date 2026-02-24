<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Profile extends Model
{
    use HasRoles;
        protected $primaryKey = 'profile_id';

    protected $fillable = [
        'first_name','middle_name','last_name',
        'email','mobile_number','birthdate','sex','address','roles_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'profile_id', 'profile_id');
    }

    public function memberDetail()
    {
        return $this->hasOne(MemberDetail::class, 'profile_id', 'profile_id');
    }

    public function staffDetail()
    {
        return $this->hasOne(StaffDetail::class, 'profile_id', 'profile_id');
    }

     public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }

        public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public function getSystemRolesAttribute(): string
    {
        $roles = [];

        if ($this->memberDetail) {
            $roles[] = 'Member';
        }

        if ($this->staffDetail) {
            $roles[] = 'Staff';
        }

        return empty($roles) ? 'None' : implode(' / ', $roles);
    }

}
