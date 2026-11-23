<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva tarea - Control de tareas</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        a { color: #000; }
        label { display: block; margin-top: 12px; }
        input, select, textarea { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px; width: 320px; border: 1px solid #000; }
        textarea { height: 100px; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; margin-top: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
        .error { margin-top: 4px; }
    </style>
</head>
<body>
    <h1>Control de tareas</h1>
    <h2>Nueva tarea</h2>

    <form method="POST" action="{{ route('tareas.store') }}">
        @csrf

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        @error('titulo')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="responsable">Responsable</label>
        <input type="text" id="responsable" name="responsable" value="{{ old('responsable') }}">
        @error('responsable')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="fecha_limite">Fecha límite</label>
        <input type="date" id="fecha_limite" name="fecha_limite" value="{{ old('fecha_limite') }}">
        @error('fecha_limite')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="estado">Estado</label>
        <select id="estado" name="estado">
            <option value="">Seleccione</option>
            <option value="pendiente" {{ old('estado') === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="en proceso" {{ old('estado') === 'en proceso' ? 'selected' : '' }}>En proceso</option>
            <option value="completada" {{ old('estado') === 'completada' ? 'selected' : '' }}>Completada</option>
        </select>
        @error('estado')
            <div class="error">{{ $message }}</div>
        @enderror

        <div>
            <button type="submit">Guardar</button>
            <a href="{{ route('tareas.index') }}">Cancelar</a>
        </div>
    </form>
</body>
</html>
