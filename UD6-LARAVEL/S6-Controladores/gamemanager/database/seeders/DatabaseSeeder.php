<?php

namespace Database\Seeders;

use App\Models\Desarrolladora;
use App\Models\FichaTecnica;
use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $generos = collect([
            'Acción',
            'Aventura',
            'Rol',
            'Estrategia',
            'Deportes',
            'Simulación',
            'Mundo abierto',
            'Plataformas',
        ])->map(function (string $nombre) {
            return Genero::firstOrCreate([
                'nombre' => $nombre,
            ]);
        });

        Desarrolladora::factory(5)
            ->create()
            ->each(function (Desarrolladora $desarrolladora)
                use ($generos) {

                Videojuego::factory(
                    fake()->numberBetween(2, 4)
                )
                    ->for($desarrolladora)
                    ->create()
                    ->each(function (Videojuego $videojuego)
                        use ($generos) {

                        FichaTecnica::factory()
                            ->for($videojuego)
                            ->create();

                        $videojuego->generos()->attach(
                            $generos
                                ->random(
                                    fake()->numberBetween(1, 3)
                                )
                                ->pluck('id')
                                ->toArray()
                        );
                    });
            });
    }
}