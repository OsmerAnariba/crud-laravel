<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión - Control de tareas</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; margin: 40px; }
        h1 { font-size: 24px; }
        label { display: block; margin-top: 12px; }
        input { font-family: "Times New Roman", Times, serif; font-size: 16px; padding: 4px; width: 260px; border: 1px solid #000; }
        button { font-family: "Times New Roman", Times, serif; font-size: 16px; margin-top: 16px; padding: 4px 12px; border: 1px solid #000; background: #fff; color: #000; cursor: pointer; }
        .error { margin-top: 4px; }
    </style>
</head>
<body>
    <h1>Control de tareas</h1>
    <h2>Iniciar sesión</h2>

    <form method="POST" action="{{ route('login.entrar') }}">
        @csrf

        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus>
        @error('username')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Entrar</button>
    </form>
</body>
</html>