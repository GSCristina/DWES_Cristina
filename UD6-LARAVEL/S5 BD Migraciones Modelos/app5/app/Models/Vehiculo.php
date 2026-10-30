<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
   

    protected $fillable = [
    'estacion_id',
    'modelo',
    'tipo',
    'disponible',
    'autonomia_km',
    'requiere_revision',
];
public function estacion(): BelongsTo
    {
        return $this->belongsTo(Estacion::class);
    }
}
