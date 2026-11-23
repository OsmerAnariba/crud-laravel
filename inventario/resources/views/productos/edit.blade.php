@extends('layouts.app')
@section('titulo', 'Editar producto')
@section('contenido')
    <h1>Editar producto #{{ $producto->id }}</h1>

    <form method="POST" action="{{ route('productos.update', $producto) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="codigo">Código:</label><br>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}">
            @error('codigo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
            @error('nombre')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="precio">Precio:</label><br>
            <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio', $producto->precio) }}">
            @error('precio')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="existencias">Existencias:</label><br>
            <input type="number" id="existencias" name="existencias" step="1" value="{{ old('existencias', $producto->existencias) }}">
            @error('existencias')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Actualizar</button>
        <a href="{{ route('productos.index') }}">Cancelar</a>
    </form>
@endsection