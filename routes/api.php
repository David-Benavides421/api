


<?php
//use App\Http\Controllers\ProductoController;
//use Illuminate\Support\Facades\Route;

//Route::prefix('productos')->group(function () {
    
  //  Route::get('/', [ProductoController::class, 'index']);
    //Route::post('/{id}', [ProductoController::class, 'store']);
    //Route::get('/{id}', [ProductoController::class, 'show']);
    //Route::put('/{id}', [ProductoController::class, 'update']);
   // Route::delete('/{id}', [ProductoController::class, 'destroy']);
//});
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Asegúrate que el namespace sea correcto

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar rutas API para tu aplicación. Laravel
| automáticamente añade el prefijo "/api" a estas rutas.
|
*/

Route::apiResource('productos', ProductoController::class); // <-- ¡AÑADE ESTA LÍNEA!

// Comenta o elimina el bloque anterior:
/*
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index']);
    Route::post('/', [ProductoController::class, 'store']);
    Route::get('/{id}', [ProductoController::class, 'show']);
    Route::put('/{id}', [ProductoController::class, 'update']);
    Route::delete('/{id}', [ProductoController::class, 'destroy']);
});
*/