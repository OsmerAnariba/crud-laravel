@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <p>Sistema de administración del catálogo de la biblioteca.</p>
    @if (Route::has('libros.index'))
        <a class="btn" href="{{ route('libros.index') }}">Ver catálogo de libros</a>
    @endif
@endsection