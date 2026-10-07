<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'apellido', 'gmail', 'nacionalidad', 'ciudad', 'password', 'rol'
    ];

    protected $hidden = ['password'];

    public function checkPassword(string $password): bool
    {
        return Hash::check($password, $this->password);
    }
}
