<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        // 30 registros ficticios normales.
        Song::factory()->count(40)->create();

        // 5 canciones populares y 5 pendientes de publicación.
        Song::factory()->popular()->count(5)->create();
        Song::factory()->pending()->count(10)->create();

        // Registros conocidos y estables para identificar resultados.
        $examples = [
            [
                'title' => 'Bohemian Rhapsody',
                'artist' => 'Queen',
                'album' => 'A Night at the Opera',
                'genre' => 'rock',
                'duration_seconds' => 354,
                'release_year' => 1975,
                'plays' => 2500000,
                'price' => 1.99,
                'published' => true,
            ],
            [
                'title' => 'Billie Jean',
                'artist' => 'Michael Jackson',
                'album' => 'Thriller',
                'genre' => 'pop',
                'duration_seconds' => 294,
                'release_year' => 1982,
                'plays' => 3000000,
                'price' => 1.99,
                'published' => true,
            ],
            [
                'title' => 'Take Five',
                'artist' => 'The Dave Brubeck Quartet',
                'album' => 'Time Out',
                'genre' => 'jazz',
                'duration_seconds' => 324,
                'release_year' => 1959,
                'plays' => 900000,
                'price' => 1.49,
                'published' => true,
            ],
        ];

        foreach ($examples as $example) {
            Song::updateOrCreate(
                [
                    'title' => $example['title'],
                    'artist' => $example['artist'],
                ],
                $example
            );
        }
    }
}