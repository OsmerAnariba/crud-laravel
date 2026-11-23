@extends('layouts.app')
@section('titulo', 'Editar estudiante')
@section('contenido')
    <h1>Editar estudiante #{{ $estudiante->id }}</h1>

    <form method="POST" action="{{ route('estudiantes.update', $estudiante) }}">
        @csrf
        @method('PUT')

        <p>
            <label for="numero_cuenta">Número de cuenta:</label><br>
            <input type="text" id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta', $estudiante->numero_cuenta) }}">
            @error('numero_cuenta')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}">
            @error('nombre')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="correo">Correo:</label><br>
            <input type="text" id="correo" name="correo" value="{{ old('correo', $estudiante->correo) }}">
            @error('correo')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="fecha_nacimiento">Fecha de nacimiento:</label><br>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento->format('Y-m-d')) }}">
            @error('fecha_nacimiento')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}">Cancelar</a>
    </form>
@endsection