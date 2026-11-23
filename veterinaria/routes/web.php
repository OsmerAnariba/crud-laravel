<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion'])->name('login.entrar');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('mascotas.index');
    })->name('inicio');

    Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');

    Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');
});
