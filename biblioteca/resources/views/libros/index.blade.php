@extends('layouts.app')
@section('titulo', 'Libros')
@section('contenido')
    <h1>Catálogo de libros</h1>

    <p><a href="{{ route('libros.create') }}">Registrar nuevo libro</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año de publicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->codigo }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
                <td>
                    <a href="{{ route('libros.edit', $libro) }}">Editar</a>

                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('¿Seguro que desea eliminar este libro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No hay libros registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection