<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPlantilla extends Model
{
    protected $table='plantilla';
	protected $primaryKey='idPlantilla';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'tipoTerreno',
		'tipoConexion',
		'diametro',
    ];
}
