<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['codigo', 'nombre', 'precio', 'existencias'])]
class Producto extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
        ];
    }
}
