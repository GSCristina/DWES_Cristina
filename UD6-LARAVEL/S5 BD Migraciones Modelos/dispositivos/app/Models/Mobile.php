<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $primaryKey = 'codigo';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $guarded = [
        'codigo',
        'imei',
    ];
}