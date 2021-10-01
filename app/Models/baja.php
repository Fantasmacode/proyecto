<?php

namespace App\Models;

use App\Models\bovino;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baja extends Model
{
	protected $primaryKey = "id_baja";
	public $table = "baja";
	public $timestamps = false;

	protected $fillable = [
		'id_bovino',
		'motivo_baja',
		'fecha_baja',
	];

	public function bovino()
	{
		return $this->belongsTo(bovino::class, 'id_bovino');
	}
}
