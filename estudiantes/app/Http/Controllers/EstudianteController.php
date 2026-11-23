<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id')->get();

        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        Estudiante::create($this->validar($request));

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado correctamente.');
    }

        public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $estudiante->update($this->validar($request, $estudiante));

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

        public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }

    private function validar(Request $request, ?Estudiante $estudiante = null): array
    {
        return $request->validate([
            'numero_cuenta' => ['required', 'string', 'max:50',
                                Rule::unique('estudiantes', 'numero_cuenta')->ignore($estudiante?->id)],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:255',
                         Rule::unique('estudiantes', 'correo')->ignore($estudiante?->id)],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ], [
            'numero_cuenta.required' => 'El número de cuenta es obligatorio.',
            'numero_cuenta.unique' => 'Ya existe un estudiante con ese número de cuenta.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar 100 caracteres.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Ingrese un correo electrónico válido.',
            'correo.unique' => 'Ya existe un estudiante con ese correo.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'Ingrese una fecha válida.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ]);
    }
}