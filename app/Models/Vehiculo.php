<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tipoVehiculo()
    {
        return $this->hasOne(TipoVehiculo::class);
    }
}
