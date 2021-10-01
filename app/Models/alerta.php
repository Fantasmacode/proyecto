<?php

namespace App\Models;

use App\Models\bovino;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alerta extends Model
{
	protected $primaryKey = "id_alerta";
	public $table = "alerta";
	public $timestamps = false;

	protected $fillable = [
		'id_bovino',
		'mensaje_alerta',
		'fecha_alerta',
		'hora_alerta',
	];

	public function bovino()
	{
		return $this->belongsTo(bovino::class, 'id_bovino');
	}
}
