<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        protected $primaryKey = 'roles_id';

    protected $fillable = ['name'];

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'roles_id', 'roles_id');
    }
}
