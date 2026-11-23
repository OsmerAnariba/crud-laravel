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
    Route::get('/tareas/crear', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('/tareas/{tarea}/editar', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::put('/tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');

    Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');
});