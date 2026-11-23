@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <p>Sistema de administración del registro de estudiantes.</p>

    @if (Route::has('estudiantes.index'))
        <p><a href="{{ route('estudiantes.index') }}">Ver registro de estudiantes</a></p>
    @endif
@endsection