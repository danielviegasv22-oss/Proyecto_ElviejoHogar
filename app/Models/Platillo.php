<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $table = 'platillos';

    protected $fillable = [
        'nombre', 'pais', 'bandera', 'precio', 'ciudad', 'local', 'calle', 'descripcion', 'imagen'
    ];

    protected $casts = [
        'precio' => 'float',
    ];

    public static function flagFor(string $pais): string
    {
        return match ($pais) {
            'Argentina'     => '🇦🇷',
            'España'        => '🇪🇸',
            'México'        => '🇲🇽',
            'China'         => '🇨🇳',
            'Italia'        => '🇮🇹',
            'Uruguay'       => '🇺🇾',
            'Colombia'      => '🇨🇴',
            'Perú'          => '🇵🇪',
            'Chile'         => '🇨🇱',
            default         => '🌐',
        };
    }
}
