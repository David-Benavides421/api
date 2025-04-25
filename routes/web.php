<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas públicas (cualquiera puede acceder)
Route::get('/', function () {
    return view('welcome');
});

// Ruta de dashboard genérica (solo requiere login)
// Breeze ya crea esta ruta y la protege con 'auth' y 'verified' (si la verificación de email está activa)
// La dejamos como está por defecto para usuarios logueados en general.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Rutas para USUARIOS AUTENTICADOS ---
Route::middleware('auth')->group(function () {
    // Perfil (Breeze ya crea estas rutas y las protege con 'auth')
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard/cars', [CarController::class, 'index']);

    // --- Rutas específicas para USUARIOS con rol 'user' (Opcional) ---
    // A menudo, solo necesitas 'auth'. Pero si quieres rutas SOLO para 'user' y no para 'admin':
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/settings', function () {
            // Lógica/Vista para la configuración del usuario normal
            return "<h1>Configuración de Usuario</h1><p>Bienvenido ". Auth::user()->name ."</p>"; // Ejemplo simple
        })->name('settings');
    });

    // --- Rutas específicas para ADMINISTRADORES ---
    // Se requiere estar autenticado ('auth') Y tener el rol 'admin' ('role:admin')
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            // Lógica/Vista para el dashboard del admin
            return "<h1>Panel de Administración</h1><p>Bienvenido Administrador ". Auth::user()->name ."</p>"; // Ejemplo simple
        })->name('dashboard');

        Route::get('/users', function () {
            // Lógica/Vista para gestionar usuarios (ejemplo)
            return "<h1>Gestión de Usuarios (Admin)</h1>";
        })->name('users.index');

        //Route::get('/dashboard/cars', [CarController::class, 'index']);

        // Puedes añadir más rutas de admin aquí (crear, editar, borrar usuarios, etc.)
    });
});

// Incluir las rutas de autenticación generadas por Breeze (login, register, etc.)
// Esta línea ya debería estar si ejecutaste breeze:install correctamente
require __DIR__.'/auth.php';
