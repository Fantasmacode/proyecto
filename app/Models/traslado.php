<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traslado extends Model
{
	protected $primaryKey = "id_traslado";
	public $table = "traslados";
	public $timestamps = false;

	protected $fillable = [
		'id_bovino',
		'id_moti',
		'fechas_traslado',
		'horas_traslado',
		'fechar_traslado',
		'horar_traslado',
	];

	public function bovino()
    {
        return $this->belongsTo(bovino::class, 'id_bovino');
    }

    public function motivo()
    {
        return $this->belongsTo(motivo::class, 'id_moti');
    }
}
