<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaCliente($id){
        $perfilCliente= DB::table('users')
        ->join('clientes', 'users.id', '=', 'clientes.id_usuario')
        ->selectRaw('CONCAT(nombre1, " ", nombre2) AS nombres, CONCAT(apellido1, " ", apellido2) AS apellidos, usuario, contraseña, contacto, identificacion, clientes.fecha_creacion, clientes.fecha_modificacion')
        ->where('clientes.id_usuario', '=', $id)
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
        $perfilCliente = DB::table('users')
        ->join('clientes', 'users.id', '=', 'clientes.id_usuario')
        ->selectRaw('CONCAT(nombre1, " ", nombre2) AS nombres, CONCAT(apellido1, " ", apellido2) AS apellidos, usuario, contraseña, contacto, identificacion, clientes.fecha_creacion')
        ->where('clientes.id_usuario', '=', $id)
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
    $perfilCliente = DB::table('users')
        ->join('clientes', 'users.id', '=', 'clientes.id_usuario')
        ->selectRaw('CONCAT(nombre1, " ", nombre2) AS nombres, CONCAT(apellido1, " ", apellido2) AS apellidos, usuario, contraseña, contacto, identificacion, clientes.fecha_creacion')
        ->where('clientes.id_usuario', '=', $id)
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

    $datosCliente->nombres = DB::raw('CONCAT(nombre1, " ", nombre2)');
    $datosCliente->apellidos = DB::raw('CONCAT(apellido1, " ", apellido2)');
    $datosCliente->usuario = $request->usuario;
    $datosCliente->contraseña = $request->contraseña;
    $datosCliente->contacto = $request->contacto;
    $datosCliente->identificacion = $request->identificacion;

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
