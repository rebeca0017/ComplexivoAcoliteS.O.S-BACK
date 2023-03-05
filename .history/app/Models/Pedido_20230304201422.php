<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_vehiculo',
        'id_cliente',
        'id_mecanico',
        'ubicacion',
        'detalle'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}