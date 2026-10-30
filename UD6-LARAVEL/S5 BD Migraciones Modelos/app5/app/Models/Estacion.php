<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estacion extends Model
{
    protected $table = 'estaciones';
    protected $fillable = [
        'nombre',
        'codigo',
        'activa',
    ];
    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }
}
