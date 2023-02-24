<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verVehiculos()
    {
        $vehiculos = DB::table('vehiculos')
        ->select('*')
        ->get();
       
        return $vehiculos;
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
        $id_users = User::latest('id')->first()->id;
        $tipo_vehiculo = TipoVehiculo::latest('id')->first()->id;

        $datosVehiculo = new Vehiculo();
        
        $datosVehiculo->id = $request->id;
        $datosVehiculo->marca = $request->marca;
        $datosVehiculo->placa = $request->placa;
        $datosVehiculo->color = $request->color;
        $datosVehiculo->modelo = $request->modelo;
        $datosVehiculo->id_users = $id_users;
        $datosVehiculo->id_tipo_vehiculo = $tipo_vehiculo;
        $datosVehiculo->save();

        return ('vehiculo agregado con exito');
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
        $vehiculo = Vehiculo::findOrFail($id);
        return $vehiculo;
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
        $tipo_vehiculo = TipoVehiculo::latest('id')->first()->id;
        $vehiculo = Vehiculo::findOrFail($id);
        

        $vehiculo->marca = $request->marca;
        $vehiculo->placa = $request->placa;
        $vehiculo->color = $request->color;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->id_tipo_vehiculo = $tipo_vehiculo;
        $vehiculo->update();
        return ('vehiculo editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarVehiculo = Vehiculo::findOrFail($id);
        $eliminarVehiculo->delete();
        return ('vehiculo eliminado con exito');
    }
}
