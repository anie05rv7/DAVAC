<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
// Rutas públicas (no requieren autenticación)
Route::post('/login', 'AuthController@login'); // Ejemplo de ruta para iniciar sesión y obtener el token

// Rutas protegidas por JWT
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'users'], function () {
        // Ruta para obtener todos los usuarios
        Route::get('/', [UserController::class, 'index']);

        // Ruta para crear un nuevo usuario
        Route::post('/', [UserController::class, 'store']);

        // Ruta para obtener un usuario específico por ID
        Route::get('/{id}', [UserController::class, 'show']);

        // Ruta para actualizar un usuario por ID
        Route::put('/{id}', [UserController::class, 'update']);

        // Ruta para desactivar un usuario por ID
        Route::put('/deactivate/{id}', [UserController::class, 'deactivate']);
    });

    
});

