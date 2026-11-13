<?php

namespace Database\Factories;

use App\Models\Desarrolladora;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideojuegoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->unique()->words(3, true),
            'descripcion' => fake()->paragraph(),
            'anio' => fake()->numberBetween(2000, 2026),
            'precio' => fake()->randomFloat(2, 9, 79),
            'publicado' => fake()->boolean(85),
            'desarrolladora_id' =>
                Desarrolladora::factory(),
        ];
    }
}
