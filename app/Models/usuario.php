<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_usuario';
    public $table = "usuario";
    public $timestamps = false;

    protected $fillable = [
        'nombres_usuario',
        'apellidos_usuario',
        'tipodoc_usuario',
        'documento_usuario',
        'correo_usuario',
        'direccion_usuario',
        'telefono_usuario',
        'contrasena_usuario',
        'rol_usuario',
    ];

    protected $hidden = [
        'contrasena_usuario',
    ];

    public function getAuthPassword() {
        return $this->contrasena_usuario;
    }
}
