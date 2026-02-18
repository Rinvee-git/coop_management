<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        protected $primaryKey = 'profile_id';

    protected $fillable = [
        'first_name','middle_name','last_name',
        'email','mobile_number','birthdate','sex','address','roles_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'profile_id', 'profile_id');
    }

     public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'roles_id');
    }

        public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }


}
