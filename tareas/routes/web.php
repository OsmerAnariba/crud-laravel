<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion'])->name('login.entrar');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('tareas.index');
    })->name('inicio');

    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

    Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');
});