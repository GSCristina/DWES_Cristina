<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            ['Dior', 'Francia'],
            ['Chanel', 'Francia'],
            ['Rare Beauty', 'Estados Unidos'],
            ['Fenty Beauty', 'Barbados'],
            ['Charlotte Tilbury', 'Reino Unido'],
            ['Lancôme', 'Francia'],
            ['Estée Lauder', 'Estados Unidos'],
            ['The Ordinary', 'Canadá'],
            ['Clinique', 'Estados Unidos'],
            ['Armani Beauty', 'Italia'],
        ];

        foreach ($brands as [$name, $country]) {
            Brand::firstOrCreate(['name' => $name], ['country' => $country]);
        }
    }
}
