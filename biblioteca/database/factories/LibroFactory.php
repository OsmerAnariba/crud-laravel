<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Libro>
 */
class LibroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->numerify('LIB-####'),
            'titulo' => rtrim(fake()->sentence(3), '.'),
            'autor' => fake()->name(),
            'anio_publicacion' => fake()->numberBetween(1450, (int) date('Y')),
        ];
    }
}