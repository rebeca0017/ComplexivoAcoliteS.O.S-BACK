<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'marca',
        'modelo',
        'placa',
        'color',
        'tipo_vehiculo',
        'id_user',
    ];

    public $timestamps = false;

    public function tipo_vehiculo()
    {
        return $this->hasOne(TipoVehiculo::class,'tipo_vehiculo');
    }

    public function id_user()
    {
        return $this->hasOne(User::class,'id_users');
    }
}
