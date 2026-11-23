<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->numerify('PROD-####'),
            'nombre' => rtrim(fake()->words(3, true), '.'),
            'precio' => fake()->randomFloat(2, 1, 5000),
            'existencias' => fake()->numberBetween(0, 200),
        ];
    }
}
