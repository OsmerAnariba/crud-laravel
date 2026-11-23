@extends('layouts.app')
@section('titulo', 'Estudiantes')
@section('contenido')
    <h1>Registro de estudiantes</h1>

    <p><a href="{{ route('estudiantes.create') }}">Nuevo estudiante</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de cuenta</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->numero_cuenta }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('estudiantes.edit', $estudiante) }}">Editar</a>

                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('¿Seguro que desea eliminar este estudiante?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection