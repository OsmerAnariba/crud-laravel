<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('inicio'))->name('inicio');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/{libro}/editar', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

});