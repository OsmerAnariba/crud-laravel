<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva mascota - Veterinaria</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        a { color: #000; }
        label { display: block; margin-top: 12px; }
        input, select { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px; width: 280px; border: 1px solid #000; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; margin-top: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
        .error { margin-top: 4px; }
    </style>
</head>
<body>
    <h1>Registro de mascotas</h1>
    <h2>Nueva mascota</h2>

    <form method="POST" action="{{ route('mascotas.store') }}">
        @csrf

        <label for="codigo">Código</label>
        <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}">
        @error('codigo')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="especie">Especie</label>
        <select id="especie" name="especie">
            <option value="">Seleccione</option>
            <option value="perro" {{ old('especie') === 'perro' ? 'selected' : '' }}>Perro</option>
            <option value="gato" {{ old('especie') === 'gato' ? 'selected' : '' }}>Gato</option>
            <option value="otro" {{ old('especie') === 'otro' ? 'selected' : '' }}>Otro</option>
        </select>
        @error('especie')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="propietario">Propietario</label>
        <input type="text" id="propietario" name="propietario" value="{{ old('propietario') }}">
        @error('propietario')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        @error('fecha_nacimiento')
            <div class="error">{{ $message }}</div>
        @enderror

        <div>
            <button type="submit">Guardar</button>
            <a href="{{ route('mascotas.index') }}">Cancelar</a>
        </div>
    </form>
</body>
</html>
