<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\ValoracionController;
use App\Http\Controllers\ContratacionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('mensajes', MensajeController::class);
    Route::resource('disponibilidades', DisponibilidadController::class);
    Route::resource('valoraciones', ValoracionController::class);
    Route::resource('contrataciones', ContratacionController::class);
});

require __DIR__.'/auth.php';
