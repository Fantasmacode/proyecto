<?php

namespace App\Models;

use App\Models\alerta;
use App\Models\baja;
use App\Models\estadobovino;
use App\Models\traslados;
use App\Models\ubicacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bovino extends Model
{
	protected $primaryKey = "id_bovino";
	public $table = "bovino";
	public $timestamps = false;

	protected $fillable = [
		'id_usuario',
		'id_lote',
		'id_comercio',
		'id_estadob',
		'id_raz',
		'peso_bovino',
		'edad_bovino',
		'finalidad_bovino',
		'fecha_bovino',
	];

	public function estado()
	{
		return $this->belongsTo(estadobovino::class, 'id_estadob');
	}

	public function raza()
	{
		return $this->belongsTo(raza::class, 'id_raz');
	}

	public function lote()
	{
		return $this->belongsTo(lote::class, 'id_lote');
	}

	public function comercio()
	{
		return $this->belongsTo(comercio::class, 'id_comercio');
	}

	public function usuario()
	{
		return $this->belongsTo(usuario::class, 'id_usuario');
	}

	public function baja()
	{
		return $this->hasOne(baja::class, 'id_bovino');
	}

	public function traslados()
	{
		return $this->hasMany(traslados::class, 'id_bovino');
	}

	public function alertas()
	{
		return $this->hasMany(alerta::class, 'id_bovino');
	}

	public function ubicacion()
	{
		return $this->hasOne(ubicacion::class, 'id_bovino');
	}
}
