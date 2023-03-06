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
    public function getVehiculos()
    {
        $vehiculos = Vehiculo::where('id_user', auth()->user()->id)->get();

        return $vehiculos;
    }



    public function getVehiculo($id)
    {
        $vehiculo = Vehiculo::find($id);

        return $vehiculo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVehiculo(Request $request)
    {
        $vehiculo = Vehiculo::create(array_merge($request->all(), ['id_user' => auth()->user()->id]));

        return response()->json([
            'status' => 'success',
            'message' => 'Vehiculo creado correctamente'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVehiculo(Request $request, $id)
    {
    
        $vehiculo = Vehiculo::find($id);
        $vehiculo -> fill($request->all());
        $vehiculo->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Vehiculo editado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVehiculo($id)
    {
        $eliminarVehiculo = Vehiculo::findOrFail($id);
        $eliminarVehiculo->delete();
        return ('vehiculo eliminado con exito');
    }
}
