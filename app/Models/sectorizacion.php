<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectorizacion extends Model
{
	protected $primaryKey = "id_sectorizacion";
	public $table = "sectorizacion";
	public $timestamps = false;

	protected $fillable = [
		'id_lote',
		'latitud_sectorizacion',
		'longitud_sectorizacion',
	];

	public function lote()
    {
        return $this->belongsTo(lote::class, 'id_lote');
    }
}
