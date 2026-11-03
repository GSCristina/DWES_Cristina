<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $primaryKey = 'codigo';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'codigo',
        'marca',
        'modelo',
        'procesador',
        'ram_gb',
        'precio',
    ];
}
