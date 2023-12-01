<?php
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas Sensor
Route::post('/sensores', [SensorController::class, 'create']);
Route::put('/sensores/{id}', [SensorController::class, 'update']);
//Rutas Empresa
Route::get('/empresas', [EmpresaController::class, 'index']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::post('/empresas', [EmpresaController::class, 'create']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);
 //Rutas Vitrinas
 Route::get('/vitrinas', [VitrinaController::class, 'index']);
 Route::get('/vitrinas/{id}', [VitrinaController::class, 'show']);
 Route::post('/vitrinas', [VitrinaController::class, 'create']);
 Route::put('/vitrinas/{id}', [VitrinaController::class, 'update']);
 Route::delete('/vitrinas/{id}', [VitrinaController::class, 'destroy']);


