<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use App\Models\Pedido;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
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


    //pedidos en espera
    public function pedidosEsperando()
    {
        // Obtener todos los pedidos en espera de la tabla de pedidos
        $pedidos = Pedido::all();

        return $pedidos;
    }

    public function aceptarPedido($idPedido, $idMecanico) {
        $pedido = Pedido::findOrFail($idPedido);
        $pedido->estado = 'aceptado';
        
        if ($idMecanico != null) {
            $mecanico = Mecanico::findOrFail($idMecanico);
            $pedido->id_mecanico = $mecanico->id;
        }
        
        $pedido->save();
        
        return response()->json(['message' => 'Pedido aceptado correctamente']);
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function hola(){
        return ('hola');
    }
}
