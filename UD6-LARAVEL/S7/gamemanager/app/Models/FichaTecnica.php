<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichaTecnica extends Model
{
    // El plural español no coincide con la convención inglesa de Eloquent.
    protected $table = 'fichas_tecnicas';

    use HasFactory;

    protected $fillable = [
        'plataforma',
        'motor_grafico',
        'edad_recomendada',
        'espacio_gb',
        'modo_juego',
        'videojuego_id',
    ];

    public function videojuego(): BelongsTo
    {
        return $this->belongsTo(Videojuego::class);
    }
}