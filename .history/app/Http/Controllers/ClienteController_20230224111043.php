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
        
        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtenemos el usuario autenticado actualmente
            $user = Auth::user();

            // Obtenemos la información del cliente asociado al usuario autenticado
            $perfilCliente = DB::table('users')
                ->join('clientes', 'users.id', '=', 'clientes.user_id')
                ->select('name', 'email', 'nombres', 'apellidos', 'contacto', 'identificacion', 'clientes.estado')
                ->where('users.id', $user->id)
                ->first();

            // Devolvemos la vista con la información del cliente
            return $user->id;
        } else {
            // Redirigir al usuario a la página de inicio de sesión si no está autenticado
            return ('no esta logeado');
        }
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
