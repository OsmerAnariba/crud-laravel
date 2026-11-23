<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    public function run(): void
    {
        Tarea::factory()->count(10)->create();
    }
}