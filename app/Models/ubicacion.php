<?php

namespace App\Models;

use App\Models\bovino;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ubicacion extends Model
{
	protected $primaryKey = "id_ubicacion";
	public $table = "ubicacion";
	public $timestamps = false;

	protected $fillable = [
		'id_bovino',
		'latitud_ubicacion',
		'longitud_ubicacion',
		'fecha_ubicacion',
		'hora_ubicacion',
	];

	public function bovino()
	{
		return $this->belongsTo(bovino::class, 'id_bovino');
	}
}
