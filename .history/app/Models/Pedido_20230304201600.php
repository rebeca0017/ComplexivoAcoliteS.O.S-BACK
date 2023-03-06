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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function mecanico()
    {
        return $this->belongsTo(mecanico::class);
    }
}