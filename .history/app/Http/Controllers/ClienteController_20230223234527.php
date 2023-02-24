<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;


class ClienteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaCliente(){
        
        $perfilCliente= DB::table('users')
        ->join('clientes', 'users.id', '=', 'clientes.user_id')
        ->select('id','name','email','nombres','apellidos','contacto','identificacion','clientes.estado')
        ->get();
        return $perfilCliente;
   
        
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
        $perfilCliente= DB::table('users')
        ->join('clientes', 'users.id', '=', 'clientes.user_id')
        ->select('name','email','nombres','apellidos','contacto','identificacion','clientes.estado')
        ->where('clientes.user_id', '=', $id)
        ->get();
        return $perfilCliente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $perfilCliente= DB::table('users')
    ->join('clientes', 'users.id', '=', 'clientes.user_id')
    ->select('name','email','nombres','apellidos','contacto','identificacion','clientes.estado')
    ->where('clientes.user_id', '=', $id)
    ->get();
    return $perfilCliente;
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $datosCliente = User::findOrFail($id);

    $datosCliente->name =  $request->name;
    $datosCliente->email = $request->email;
    $datosCliente->nombres = $request->nombres;
    $datosCliente->apellidos = $request->apellidos;
    $datosCliente->contacto = $request->contacto;

    $datosCliente->save();

    return response()->json(['message' => 'Tu informacion general fue actualizada con exito']);
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
}
