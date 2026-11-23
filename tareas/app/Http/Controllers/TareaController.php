<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('id')->get();

        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => ['required', 'in:pendiente,en proceso,completada'],
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede superar los 150 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
            'responsable.required' => 'El responsable es obligatorio.',
            'responsable.max' => 'El responsable no puede superar los 100 caracteres.',
            'fecha_limite.required' => 'La fecha límite es obligatoria.',
            'fecha_limite.date' => 'Ingrese una fecha válida.',
            'estado.required' => 'Seleccione un estado.',
            'estado.in' => 'El estado debe ser pendiente, en proceso o completada.',
        ]);

        Tarea::create($datos);

        return redirect()
            ->route('tareas.index')
            ->with('exito', 'Tarea registrada correctamente.');
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => ['required', 'in:pendiente,en proceso,completada'],
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título no puede superar los 150 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
            'responsable.required' => 'El responsable es obligatorio.',
            'responsable.max' => 'El responsable no puede superar los 100 caracteres.',
            'fecha_limite.required' => 'La fecha límite es obligatoria.',
            'fecha_limite.date' => 'Ingrese una fecha válida.',
            'estado.required' => 'Seleccione un estado.',
            'estado.in' => 'El estado debe ser pendiente, en proceso o completada.',
        ]);

        $tarea->update($datos);

        return redirect()
            ->route('tareas.index')
            ->with('exito', 'Tarea actualizada correctamente.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()
            ->route('tareas.index')
            ->with('exito', 'Tarea eliminada correctamente.');
    }
}