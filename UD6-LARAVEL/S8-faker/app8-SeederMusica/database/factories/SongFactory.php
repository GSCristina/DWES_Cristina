<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<\App\Models\Song> */
class SongFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'artist' => fake()->name(),
            'album' => fake()->optional(0.8)->words(2, true),
            'genre' => fake()->randomElement([
                'rock', 'pop', 'electronic', 'hip-hop',
                'jazz', 'classical', 'other',
            ]),
            'duration_seconds' => fake()->numberBetween(120, 420),
            'release_year' => fake()->numberBetween(1970, 2026),
            'plays' => fake()->numberBetween(0, 500000),
            'price' => fake()->randomFloat(2, 0.99, 3.99),
            'published' => fake()->boolean(85),
            'extra_data' => [
                'label' => fake()->company(),
                'language' => fake()->randomElement(['es', 'en', 'fr', 'instrumental']),
            ],
        ];
    }

    // Estado personalizado: canciones con muchas reproducciones.
    public function popular(): static
    {
        return $this->state(fn (array $attributes) => [
            'published' => true,
            'plays' => fake()->numberBetween(1000001, 10000000),
        ]);
    }

    // Estado personalizado: canción pendiente de publicación.
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'published' => false,
            'plays' => 0,
        ]);
    }
}
