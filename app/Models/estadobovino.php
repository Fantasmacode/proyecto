<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadobovino extends Model
{
	protected $primaryKey = "id_estadob";
	public $table = "estado_bovino";
	public $timestamps = false;

	protected $fillable = [
		'nombre_estadob',
	];

	public function bovinos()
	{
		return $this->hasMany(bovino::class, 'id_estadob');
	}
}
