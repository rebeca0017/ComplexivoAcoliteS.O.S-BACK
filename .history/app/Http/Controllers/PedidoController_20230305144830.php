<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mecanico;
use Illuminate\Http\Request;


use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
   
//obtenemos los pedidos del cliente
    public function getPedidos(Request $request)
{
    $clienteId = $request->user()->id;
    $pedidos = Pedido::where('id_cliente', $clienteId)->get();
    return $pedidos;
}

//creamos un pedido 
    public function createPedido(Request $request)
{
    $validatedData = $request->validate([
        'vehiculo' => 'required|string',
        'ubicacion' => 'required|string',
        'detalle' => 'nullable|string'
    ]);

    // Obtenemos el vehículo correspondiente a partir del ID proporcionado
    $vehiculo = Vehiculo::findOrFail($request->vehiculo);

    // Creamos un nuevo pedido con los datos proporcionados
    $pedido = new Pedido();
    $pedido->id_user = $request->user()->id;
    $pedido->id_cliente = $request->user()->id;
    $pedido->id_vehiculo = $vehiculo->id;
    $pedido->ubicacion = $validatedData['ubicacion'];
    $pedido->detalle = $validatedData['detalle'];
    $pedido->estado = 'espera';
    $pedido->save();

    // Devolvemos un mensaje de éxito y el ID del nuevo pedido
    return response()->json(['message' => 'Pedido creado correctamente', 'idPedido' => $pedido->id]);
}
    

   
    public function edit($id)
    {
        $detalle_pedido = Pedido::findOrFail($id);
        return $detalle_pedido;
    }

    
    public function updatePedido(Request $request, $id)
    {
        $id_vehiculo = Vehiculo::latest('id')->first()->id;
        $detalle_pedido = Pedido::findOrFail($id);
        

        $detalle_pedido->id_vehiculo = $id_vehiculo;
        $detalle_pedido->ubicacion = $request->ubicacion;
        $detalle_pedido->detalles = $request->detalles;
        $detalle_pedido->update();
        return ('pedido editado con éxito');
    }

    
    public function deletePedido($id)
    {
        $eliminarPedido = Pedido::findOrFail($id);
        $eliminarPedido->delete();
        return ('pedido eliminado con exito');
    }
}
