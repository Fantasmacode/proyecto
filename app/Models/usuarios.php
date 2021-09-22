<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombres_usuario',
        'apellidos_usuario',
        'correo_usuario',
        'direccion_usuario',
        'telefono_usuario',
        'contrasena_usuario',
        'rol_usuario',
    ];

    protected $hidden = [
        'contrasena_usuario',
    ];
}
