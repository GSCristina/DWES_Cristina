<?php

namespace Database\Factories;

use App\Models\Videojuego;
use Illuminate\Database\Eloquent\Factories\Factory;

class FichaTecnicaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'plataforma' => fake()->randomElement([
                'PC',
                'PlayStation 5',
                'Xbox Series',
                'Nintendo Switch',
                'Multiplataforma',
            ]),

            'motor_grafico' => fake()->randomElement([
                'Unreal Engine 5',
                'Unity',
                'RE Engine',
                'Frostbite',
                'Motor propio',
            ]),

            'edad_recomendada' => fake()->randomElement([
                3,
                7,
                12,
                16,
                18,
            ]),

            'espacio_gb' => fake()->numberBetween(10, 150),

            'modo_juego' => fake()->randomElement([
                'Un jugador',
                'Multijugador',
                'Un jugador y multijugador',
            ]),

            'videojuego_id' => Videojuego::factory(),
        ];
    }
}
