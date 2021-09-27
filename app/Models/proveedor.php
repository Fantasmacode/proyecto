<?php

namespace App\Models;

use App\Models\comercio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $primaryKey = "id_proveedores";
    public $table = "proveedores";
    public $timestamps = false;

    protected $fillable = [
        'nombre_proveedores',
        'direccion_proveedores',
        'telefono_proveedores',
        'correo_proveedores',
    ];

    public function comercios()
    {
        return $this->hasMany(Comercio::class, 'id_comercio');
    }
}
