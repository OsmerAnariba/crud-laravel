@extends('layouts.app')
@section('titulo', 'Nuevo estudiante')
@section('contenido')
    <h1>Registrar estudiante</h1>

    <form method="POST" action="{{ route('estudiantes.store') }}">
        @csrf

        <p>
            <label for="numero_cuenta">Número de cuenta:</label><br>
            <input type="text" id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta') }}">
            @error('numero_cuenta')
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
            <label for="correo">Correo:</label><br>
            <input type="text" id="correo" name="correo" value="{{ old('correo') }}">
            @error('correo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="fecha_nacimiento">Fecha de nacimiento:</label><br>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            @error('fecha_nacimiento')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Guardar</button>
        <a href="{{ route('estudiantes.index') }}">Cancelar</a>
    </form>
@endsection