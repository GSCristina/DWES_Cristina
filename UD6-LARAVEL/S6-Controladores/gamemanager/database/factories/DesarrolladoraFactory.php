<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DesarrolladoraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->company(),
            'pais' => fake()->country(),
            'fundacion' => fake()->numberBetween(1970, 2020),
        ];
    }
}