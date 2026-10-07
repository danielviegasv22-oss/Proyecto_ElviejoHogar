<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locales';

    protected $fillable = [
        'nombre', 'ciudad', 'calle', 'telefono', 'medios_pago', 'costo_envio'
    ];

    protected $casts = [
        'costo_envio' => 'float',
    ];
}
