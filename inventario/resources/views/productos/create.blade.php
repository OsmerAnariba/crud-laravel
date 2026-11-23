@extends('layouts.app')
@section('titulo', 'Nuevo producto')
@section('contenido')
    <h1>Registrar producto</h1>

    <form method="POST" action="{{ route('productos.store') }}">
        @csrf

        <p>
            <label for="codigo">Código:</label><br>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
            @error('codigo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="precio">Precio:</label><br>
            <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio') }}">
            @error('precio')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="existencias">Existencias:</label><br>
            <input type="number" id="existencias" name="existencias" step="1" value="{{ old('existencias') }}">
            @error('existencias')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Guardar</button>
        <a href="{{ route('productos.index') }}">Cancelar</a>
    </form>
@endsection