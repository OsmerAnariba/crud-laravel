<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id')->get();

        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        Libro::create($this->validar($request));

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado correctamente.');
    }

        public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $libro->update($this->validar($request, $libro));

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    private function validar(Request $request, ?Libro $libro = null): array
    {
        return $request->validate([
            'codigo' => ['required', 'string', 'max:50',
                         Rule::unique('libros', 'codigo')->ignore($libro?->id)],
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:100'],
            'anio_publicacion' => ['required', 'integer', 'between:1450,' . date('Y')],
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Ya existe un libro con ese código.',
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede superar 150 caracteres.',
            'autor.required' => 'El autor es obligatorio.',
            'autor.max' => 'El autor no puede superar 100 caracteres.',
            'anio_publicacion.required' => 'El año de publicación es obligatorio.',
            'anio_publicacion.integer' => 'El año debe ser un número entero.',
            'anio_publicacion.between' => 'El año debe estar entre 1450 y ' . date('Y') . '.',
        ]);
    }
}
