<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_usuario';
    public $table = "usuarios";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena_usuario',
    ];

    public function getAuthPassword() {
        return $this->contrasena_usuario;
    }
}