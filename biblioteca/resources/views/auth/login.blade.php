@extends('layouts.app')
@section('titulo', 'Iniciar sesión')
@section('contenido')
    <h1>Iniciar sesión</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus>
        @error('username') <p class="error">{{ $message }}</p> @enderror

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        @error('password') <p class="error">{{ $message }}</p> @enderror

        <p><button type="submit">Entrar</button></p>
    </form>
@endsection