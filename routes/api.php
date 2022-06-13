<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiudadController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/conductors', [ConductorController::class,'index']); //muestra todos los registros
Route::post('/conductors', [ConductorController::class,'store']); // crea un registro
Route::put('/conductors/{id}', [ConductorController::class,'update']); // actualiza un registro
Route::delete('/conductors/{id}', [ConductorController::class,'destroy']); //elimina un registro

Route::get('/supervisors', [SupervisorController::class,'index']); //muestra todos los registros
Route::post('/supervisors', [SupervisorController::class,'store']); // crea un registro
Route::put('/supervisors/{id}', [SupervisorController::class,'update']); // actualiza un registro
Route::delete('/supervisors/{id}', [SupervisorController::class,'destroy']); //elimina un registro

Route::get('/vehiculos', [VehiculoController::class,'index']); //muestra todos los registros
Route::post('/vehiculos', [VehiculoController::class,'store']); // crea un registro
Route::put('/vehiculos/{id}', [VehiculoController::class,'update']); // actualiza un registro
Route::delete('/vehiculos/{id}', [VehiculoController::class,'destroy']); //elimina un registro

Route::get('/paises', [PaisController::class,'index']); //muestra todos los registros
Route::post('/paises', [PaisController::class,'store']); // crea un registro
Route::put('/paises/{id}', [PaisController::class,'update']); // actualiza un registro
Route::delete('/paises/{id}', [PaisController::class,'destroy']); //elimina un registro

Route::get('/ciudades', [CiudadController::class,'index']); //muestra todos los registros
Route::post('/ciudades', [CiudadController::class,'store']); // crea un registro
Route::put('/ciudades/{id}', [CiudadController::class,'update']); // actualiza un registro
Route::delete('/ciudades/{id}', [CiudadController::class,'destroy']); //elimina un registro

