<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lote extends Model
{
	protected $primaryKey = "id_lote";
	public $table = "lote";
	public $timestamps = false;

	protected $fillable = [
		'id_estadol',
		'area_lote',
		'extension_lote',
		'nombre_lote',
		'fecha_lote',
		'fcierre_lote',
	];

	public function estado()
    {
        return $this->belongsTo(estadolote::class, 'id_estadol');
    }

    public function sectorizaciones()
    {
        return $this->hasMany(sectorizacion::class, 'id_sectorizacion');
    }

    public function bovinos()
	{
		return $this->hasMany(bovino::class, 'id_lote');
	}
}
