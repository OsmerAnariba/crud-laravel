<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mascotas - Veterinaria</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        a { color: #000; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #000; padding: 6px 10px; text-align: left; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Registro de mascotas</h1>
    <p>Sesión iniciada como: {{ auth()->user()->username }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <h2>Listado de mascotas</h2>

    @if (session('exito'))
        <p>{{ session('exito') }}</p>
    @endif

    <p><a href="{{ route('mascotas.create') }}">Nueva mascota</a></p>

    @if ($mascotas->isEmpty())
        <p>No hay mascotas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Propietario</th>
                    <th>Fecha de nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->id }}</td>
                        <td>{{ $mascota->codigo }}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ ucfirst($mascota->especie) }}</td>
                        <td>{{ $mascota->propietario }}</td>
                        <td>{{ $mascota->fecha_nacimiento->format('d/m/Y') }}</td>
                        <td><a href="{{ route('mascotas.edit', $mascota) }}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>