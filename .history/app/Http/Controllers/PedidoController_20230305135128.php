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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getPedidos()
     {
        $pedidos = Pedido::all();
        return $pedidos;
     }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPedido(Request $request)
    {
        
        $validatedData = $request->validate([
            'vehiculo' => 'required|string',
            'ubicacion' => 'required|string',
            'detalle' => 'nullable|string'
        ]);

        $pedido = new Pedido();
        $pedido->id_user = $request->user()->id;
        $pedido->id_cliente = $request->user()->id;
        $pedido->id_vehiculo = $request->vehiculo()->id;
        $pedido->ubicacion = $validatedData['ubicacion'];
        $pedido->detalle = $validatedData['detalle'];
        $pedido->estado = 'espera';
        $pedido->save();

        return response()->json($pedido);
    }

    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePedido($id)
    {
        $eliminarPedido = Pedido::findOrFail($id);
        $eliminarPedido->delete();
        return ('pedido eliminado con exito');
    }
}
