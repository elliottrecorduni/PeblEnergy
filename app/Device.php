<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $casts = [
        'is_legacy' => 'boolean'
    ];

}
