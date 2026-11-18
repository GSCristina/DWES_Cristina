<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::pluck('id', 'name');
        $ingredients = Ingredient::pluck('id', 'name');

        // --- 3 registros fijos reconocibles ---
        $fijos = [
            [
                'brand' => 'Dior',
                'name' => 'Capture Totale Sérum',
                'description' => 'Sérum antiedad de uso diario.',
                'price' => 89.90, 'stock' => 15,
                'ingredients' => ['Niacinamida', 'Ácido hialurónico', 'Péptidos'],
            ],
            [
                'brand' => 'Rare Beauty',
                'name' => 'Soft Pinch Blush',
                'description' => 'Colorete líquido de alta pigmentación.',
                'price' => 24.00, 'stock' => 0,
                'ingredients' => ['Glicerina', 'Escualano'],
            ],
            [
                'brand' => 'The Ordinary',
                'name' => 'Retinol 0.5% en Escualano',
                'description' => 'Tratamiento nocturno con retinol.',
                'price' => 11.50, 'stock' => 40,
                'ingredients' => ['Retinol', 'Escualano'],
            ],
        ];

        foreach ($fijos as $f) {
            $product = Product::updateOrCreate(
                ['name' => $f['name']],
                [
                    'brand_id' => $brands[$f['brand']],
                    'description' => $f['description'],
                    'price' => $f['price'],
                    'stock' => $f['stock'],
                    'is_available' => $f['stock'] > 0,
                ]
            );
            $product->ingredients()->sync(
                collect($f['ingredients'])->map(fn ($n) => $ingredients[$n])->all()
            );
        }

        // --- 25 productos generados con la Factory ---
        $todosLosIngredientes = Ingredient::pluck('id');

        Product::factory()
            ->count(25)
            ->create()
            ->each(function (Product $product) use ($todosLosIngredientes) {
                $product->ingredients()->sync(
                    $todosLosIngredientes->random(random_int(2, 5))->all()
                );
            });
    }
}