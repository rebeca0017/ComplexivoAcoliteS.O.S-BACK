<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VehiculoController;

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
Route::prefix('auth')->group(function () {
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
});


//RUTAS DEL CLIENTE

//RUTAS DEL MECANICO

//RUTAS DE LOS VEHICULOS

Route::get('/vehiculos', [VehiculoController::class, 'verVehiculos']);
Route::post('/vehiculos', [VehiculoController::class, 'store']);
Route::get('/vehiculos/edit/{id}', [VehiculoController::class, 'edit']);
Route::put('/vehiculos/edit/{id}', [VehiculoController::class, 'update']);
Route::delete('/cliente/vehiculo/delete/{id}', [VehiculoController::class, 'destroy'])-> middleware(['auth']);


//RUTAS DEL PEDIDO CLIENTE
Route::get('/pedido/cliente', [DetallePedidoController::class, 'verPedidos']);
Route::post('/pedido/cliente', [DetallePedidoController::class, 'store']);
Route::get('/pedido/cliente/edit/{id}', [DetallePedidoController::class, 'edit']);
Route::put('/pedido/cliente/edit/{id}', [DetallePedidoController::class, 'update']);
Route::delete('/pedido/cliente/delete/{id}', [DetallePedidoController::class, 'destroy']);


//RUTA CLIENTE DASHBOARD
Route::get('/cliente/dashboard',[ClienteController::class, 'vistaCliente']);
Route::get('/cliente/dashboard/edit/{id}', [ClienteController::class, 'edit']);
Route::put('/cliente/dashboard/edit/{id}', [ClienteController::class, 'update']);