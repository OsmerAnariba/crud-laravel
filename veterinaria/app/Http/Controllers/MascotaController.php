<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::orderBy('id')->get();

        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', 'unique:mascotas,codigo'],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', 'in:perro,gato,otro'],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Ya existe una mascota con ese código.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 80 caracteres.',
            'especie.required' => 'Seleccione una especie.',
            'especie.in' => 'La especie debe ser perro, gato u otro.',
            'propietario.required' => 'El propietario es obligatorio.',
            'propietario.max' => 'El propietario no puede superar los 100 caracteres.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'Ingrese una fecha válida.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ]);

        Mascota::create($datos);

        return redirect()
            ->route('mascotas.index')
            ->with('exito', 'Mascota registrada correctamente.');
    }

    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', Rule::unique('mascotas', 'codigo')->ignore($mascota->id)],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', 'in:perro,gato,otro'],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Ya existe otra mascota con ese código.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 80 caracteres.',
            'especie.required' => 'Seleccione una especie.',
            'especie.in' => 'La especie debe ser perro, gato u otro.',
            'propietario.required' => 'El propietario es obligatorio.',
            'propietario.max' => 'El propietario no puede superar los 100 caracteres.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'Ingrese una fecha válida.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ]);

        $mascota->update($datos);

        return redirect()
            ->route('mascotas.index')
            ->with('exito', 'Mascota actualizada correctamente.');
    }
}
