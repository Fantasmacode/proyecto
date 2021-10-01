<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadolote extends Model
{
	protected $primaryKey = "id_estadol";
	public $table = "estado_lote";
	public $timestamps = false;

	protected $fillable = [
		'nombre_estadol',
	];

	public function lotes()
    {
        return $this->hasMany(lote::class, 'id_estadol');
    }
}
