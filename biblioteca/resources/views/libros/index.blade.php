@extends('layouts.app')
@section('titulo', 'Libros')
@section('contenido')
    <h1>Catálogo de libros</h1>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de publicación</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay libros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection