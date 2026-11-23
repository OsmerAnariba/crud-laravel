<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion'])->name('login.entrar');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('inicio');
    })->name('inicio');

    Route::post('/logout', [LoginController::class, 'cerrarSesion'])->name('logout');
});