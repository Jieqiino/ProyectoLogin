<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $fillable=[
        'name', 'email', 'password', 'edad', 'telefono', 'direccion', 'rol'
    ];
}
