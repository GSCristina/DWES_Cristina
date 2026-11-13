<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    // Indica que el modelo Song utiliza la factoria SongFactory para generar datos de prueba 
    use HasFactory, SoftDeletes;

    // Eloquent deduce que el modelo Song utiliza la tabla songs.
    protected $fillable = [
        'title', 'artist', 'album', 'genre',
        'duration_seconds', 'release_year', 'plays',
        'price', 'published', 'extra_data',
    ];

    // Indica cómo convertir los datos obtenidos de la base de datos.
    protected function casts(): array
    {
        return [
            'duration_seconds' => 'integer',
            'release_year' => 'integer',
            'plays' => 'integer',
            'price' => 'decimal:2',
            'published' => 'boolean',
            'extra_data' => 'array',
        ];
    }
}