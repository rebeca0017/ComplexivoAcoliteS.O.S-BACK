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
        return response()->json($pedidos);
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
        
        $id_vehiculo = Vehiculo::latest('id')->first()->id;
        $id_usuario = User::latest('id')->first()->id;
        $id_cliente = Cliente::latest('id')->first()->id;
        $id_mecanico = Mecanico::latest('id')->first()->id;

        $datosPedido = new Pedido();
        
        $datosPedido->id = $request->id;
        $datosPedido->id_user = $id_usuario;
        $datosPedido->id_cliente = $id_cliente;
        $datosPedido->id_vehiculo = $id_vehiculo;
        $datosPedido->id_mecanico= $id_mecanico;
        $datosPedido->ubicacion = $request->ubicacion;
        $datosPedido->detalle = $request->detalle;
        $datosPedido->save();

        return ('pedido enviado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalle_pedido = Pedido::findOrFail($id);
        return $detalle_pedido;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
