<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio - Control de tareas</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Control de tareas</h1>
    <p>Sesión iniciada como: {{ auth()->user()->username }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>