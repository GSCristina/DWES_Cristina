<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'anio',
        'precio',
        'publicado',
        'desarrolladora_id',
    ];

    protected function casts(): array
    {
        return [
            'publicado' => 'boolean',
            'precio' => 'decimal:2',
        ];
    }

    public function desarrolladora(): BelongsTo
    {
        return $this->belongsTo(Desarrolladora::class);
    }

    public function fichaTecnica(): HasOne
    {
        return $this->hasOne(FichaTecnica::class);
    }

    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class)
            ->withTimestamps();
    }
}