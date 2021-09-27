<?php

namespace App\Models;

use App\Models\proveedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comercio extends Model
{
    protected $primaryKey = "id_comercio";
    public $table = "comercio";
    public $timestamps = false;

    protected $fillable = [
        'id_proveedores',
        'tipo_comercio',
        'fecha_comercio',
    ];

    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedores');
    }
}
