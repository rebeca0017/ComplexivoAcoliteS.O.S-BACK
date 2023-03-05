<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Pedido;
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
        $pedidos = DB::table('detalle_pedidos')
        ->select('*')
        ->get();
       
        return $pedidos;
     }
    public function index()
    {
        //
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

        $datosPedido = new Pedido();
        
        $datosPedido->id = $request->id;
        $datosPedido->id_vehiculo = $id_vehiculo;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePedido($id)
    {
        //
    }
}
