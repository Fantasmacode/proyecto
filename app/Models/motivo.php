<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivo extends Model
{
	protected $primaryKey = "id_moti";
	public $table = "motivo";
	public $timestamps = false;

	protected $fillable = [
		'motivo_moti',
	];

	public function traslados()
	{
		return $this->hasMany(traslados::class, 'id_moti');
	}
}
