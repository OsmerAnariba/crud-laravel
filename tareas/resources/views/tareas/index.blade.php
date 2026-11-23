<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tareas - Control de tareas</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        a { color: #000; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #000; padding: 6px 10px; text-align: left; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
        .en-linea { display: inline; }
    </style>
</head>
<body>
    <h1>Control de tareas</h1>
    <p>Sesión iniciada como: {{ auth()->user()->username }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <h2>Listado de tareas</h2>

    @if (session('exito'))
        <p>{{ session('exito') }}</p>
    @endif

    <p><a href="{{ route('tareas.create') }}">Nueva tarea</a></p>

    @if ($tareas->isEmpty())
        <p>No hay tareas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Responsable</th>
                    <th>Fecha límite</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->responsable }}</td>
                        <td>{{ $tarea->fecha_limite->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($tarea->estado) }}</td>
                        <td>
                            <a href="{{ route('tareas.edit', $tarea) }}">Editar</a>
                            <form method="POST" action="{{ route('tareas.destroy', $tarea) }}" class="en-linea" onsubmit="return confirm('¿Está seguro de que desea eliminar esta tarea?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
