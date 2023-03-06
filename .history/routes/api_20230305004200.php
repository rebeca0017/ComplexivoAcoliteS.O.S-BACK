<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\RolesController;

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

//RUTAS ABIERTAS
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/profile', [AuthController::class, 'getProfile']);
});

//RUTAS DE ROLES
Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'getRoles']);
});

//RUTAS PROTEGIDAS
Route::middleware('authentication')->group(function () {
    //RUTA DE MECANICO 
    Route::prefix('mecanico')->group(function () {
        Route::put('/update/{id}', [MecanicoController::class, 'update']);
        Route::post('/{idPedido}/{idMecanico}/aceptar', [MecanicoController::class, 'aceptarPedido'])->middleware('permission:ACEPTAR_PEDIDOS');
    });
     //RUTA DE CLIENTE 
    Route::prefix('cliente')->group(function () {
        Route::put('/update/{id}', [ClienteController::class, 'update']);
    });

    //RUTAS DE LOS VEHICULOS
    Route::prefix('vehiculos')->group(function () {
        Route::get('/', [VehiculoController::class, 'getVehiculos'])->middleware('permission:LEER_VEHICULOS');
        Route::get('/{id}', [VehiculoController::class, 'getVehiculo'])->middleware('permission:LEER_VEHICULOS');
        Route::post('/create', [VehiculoController::class, 'createVehiculo'])->middleware('permission:LEER_VEHICULOS');
        Route::put('/update/{id}', [VehiculoController::class, 'updateVehiculo'])->middleware('permission:LEER_VEHICULOS');
        Route::delete('/delete/{id}', [VehiculoController::class, 'deleteVehiculo'])->middleware('permission:ELIMINAR_VEHICULOS');
    });

    //RUTAS DEL PEDIDO CLIENTE
    Route::prefix('pedidos')->group(function () {
        Route::get('/', [PedidoController::class, 'getPedidos'])->middleware('permission:LEER_PEDIDOS');
        Route::get('/{id}', [PedidoController::class, 'getPedido'])->middleware('permission:LEER_PEDIDOS');
        Route::get('/cliente/{id}', [PedidoController::class, 'getPedidoByCliente'])->middleware('permission:LEER_PEDIDOS');
        Route::post('/create', [PedidoController::class, 'createPedido'])->middleware('permission:CREAR_PEDIDOS');
        Route::put('/update/{id}', [PedidoController::class, 'updatePedido'])->middleware('permission:ACTUALIZAR_PEDIDOS');
        Route::delete('/delete/{id}', [PedidoController::class, 'deletePedido'])->middleware('permission:ELIMINAR_PEDIDOS');
    });
});
