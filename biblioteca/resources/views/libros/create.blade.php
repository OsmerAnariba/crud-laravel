@extends('layouts.app')
@section('titulo', 'Nuevo libro')
@section('contenido')
    <h1>Registrar libro</h1>

    <form method="POST" action="{{ route('libros.store') }}">
        @csrf

        <p>
            <label for="codigo">Código:</label><br>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
            @error('codigo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
            @error('titulo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}">
            @error('autor')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="anio_publicacion">Año de publicación:</label><br>
            <input type="number" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion') }}">
            @error('anio_publicacion')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Guardar</button>
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </form>
@endsection