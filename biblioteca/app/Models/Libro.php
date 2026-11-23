<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['codigo', 'titulo', 'autor', 'anio_publicacion'])]
class Libro extends Model
{
    use HasFactory;
}