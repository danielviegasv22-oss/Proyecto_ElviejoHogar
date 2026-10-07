<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'codigo', 'cliente_nombre', 'cliente_email', 'ciudad_entrega',
        'direccion_entrega', 'metodo_pago', 'billetera',
        'subtotal', 'costo_envio', 'total', 'estado', 'items'
    ];

    protected $casts = [
        'items'      => 'array',
        'subtotal'   => 'float',
        'costo_envio'=> 'float',
        'total'      => 'float',
    ];
}
