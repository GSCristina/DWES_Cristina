<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = [
            ['Niacinamida', false],
            ['Ácido hialurónico', false],
            ['Retinol', false],
            ['Vitamina C', false],
            ['Ácido salicílico', false],
            ['Glicerina', false],
            ['Aloe vera', false],
            ['Manteca de karité', false],
            ['Escualano', false],
            ['Péptidos', false],
            ['Ceramidas', false],
            ['Óxido de zinc', false],
            ['Perfume (fragancia)', true],
            ['Limoneno', true],
            ['Linalool', true],
            ['Aceite de almendras', true],
        ];

        foreach ($ingredients as [$name, $allergen]) {
            Ingredient::firstOrCreate(
                ['name' => $name],
                ['is_allergen' => $allergen]
            );
        }
    }
}
