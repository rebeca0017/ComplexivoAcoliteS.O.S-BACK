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

    
    public function edit($id)
    {
        //
    }

    public function pedidosEspera()
    {
        // Obtener todos los pedidos en espera de la tabla de pedidos
        $pedidos = Pedido::where('estado', 'espera')->get();

        return response()->json([
            'pedidos' => $pedidos,
        ]);
    }

    public function aceptarPedido($idPedido, $idMecanico) {
        $pedido = Pedido::findOrFail($idPedido);
        $mecanico = Mecanico::findOrFail($idMecanico);
        
        $pedido->id_mecanico = $mecanico->id;
        $pedido->estado = 'aceptado';
        $pedido->save();
    
        return response()->json(['message' => 'Pedido aceptado correctamente']);
    }
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
