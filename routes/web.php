<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página de bienvenida (pública)
Route::get('/', function () {
    return view('welcome');
});

// Página principal después del login (Home)
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Dashboard (solo usuarios autenticados + verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil (solo usuarios logueados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===========================
//  RUTAS POR ROLES
// ===========================

// Ruta de prueba para verificar middleware de rol
Route::get('/solo-admin', function () {
    return 'Eres admin 😎';
})->middleware(['auth', 'role:admin']);

// CRUD de Tratamientos (admin + staff)
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    Route::resource('tratamientos', TratamientoController::class);
});

// CRUD de Usuarios (solo admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);

    // 👉 Ruta para activar / desactivar (toggle) usuarios
    Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
        ->name('users.toggleStatus');
});


// Rutas de autenticación (login/register) generadas por Breeze
require __DIR__.'/auth.php';