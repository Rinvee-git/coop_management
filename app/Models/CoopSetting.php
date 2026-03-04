<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoopSetting extends Model
{
    protected $table = 'coop_settings';

    protected $fillable = [
        'key',
        'value',
    ];
}
