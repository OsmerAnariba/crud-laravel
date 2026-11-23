@extends('layouts.app')
@section('titulo', 'Iniciar sesión')
@section('contenido')
    <h1>Iniciar sesión</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <p>
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus>
            @error('username')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password">
            @error('password')
                <br><span style="color:red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Entrar</button>
    </form>
@endsection