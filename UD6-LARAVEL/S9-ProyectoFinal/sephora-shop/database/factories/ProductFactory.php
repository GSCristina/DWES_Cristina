<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $tipos = [
            'Sérum', 'Crema hidratante', 'Crema de noche', 'Contorno de ojos',
            'Limpiador facial', 'Mascarilla', 'Protector solar', 'Labial',
            'Máscara de pestañas', 'Base de maquillaje', 'Colorete', 'Iluminador',
            'Perfume', 'Agua micelar', 'Tónico facial',
        ];
        $apellidos = [
            'Radiance', 'Glow', 'Pure', 'Velvet', 'Silk', 'Hydra',
            'Luminous', 'Essential', 'Intense', 'Fresh', 'Rose', 'Nude',
        ];

        $stock = fake()->numberBetween(0, 80);

        return [
            'brand_id'     => Brand::inRandomOrder()->value('id') ?? Brand::factory(),
            'name'         => fake()->randomElement($tipos) . ' ' . fake()->randomElement($apellidos),
            'description'  => fake()->sentence(12),
            'price'        => fake()->randomFloat(2, 5, 150),
            'stock'        => $stock,
            'is_available' => $stock > 0,
        ];
    }
}