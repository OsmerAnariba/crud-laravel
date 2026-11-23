<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo', 'Biblioteca')</title>
</head>
<body>
    <header>
        <strong>Biblioteca</strong>
        @auth
            | <a href="{{ route('inicio') }}">Inicio</a>
            @if (Route::has('libros.index'))
                | <a href="{{ route('libros.index') }}">Libros</a>
            @endif
            |
            <span>{{ auth()->user()->username }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        @endauth
        <hr>
    </header>

    <main>
        @if (session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif
        @yield('contenido')
    </main>
</body>
</html>