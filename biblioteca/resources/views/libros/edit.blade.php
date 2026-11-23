@extends('layouts.app')
@section('titulo', 'Editar libro')
@section('contenido')
    <h1>Editar libro #{{ $libro->id }}</h1>

    <form method="POST" action="{{ route('libros.update', $libro) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="codigo">Código:</label><br>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $libro->codigo) }}">
            @error('codigo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            @error('titulo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}">
            @error('autor')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="anio_publicacion">Año de publicación:</label><br>
            <input type="number" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion', $libro->anio_publicacion) }}">
            @error('anio_publicacion')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Actualizar</button>
        <a href="{{ route('libros.index') }}">Cancelar</a>
    </form>
@endsection