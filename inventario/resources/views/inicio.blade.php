@extends('layouts.app')
@section('titulo', 'Inicio')
@section('contenido')
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <p>Sistema de administración del inventario de productos.</p>

    @if (Route::has('productos.index'))
        <p><a href="{{ route('productos.index') }}">Ver inventario de productos</a></p>
    @endif
@endsection