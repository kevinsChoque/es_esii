<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TArchivo extends Model
{
    protected $table='archivo';
	protected $primaryKey='idArchivo';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idSolicitud',
        'idFac',
        'idMed',
        'idPre',
        'nombreFile', 
        'descripcion', 
        'tipo',
        'ruta',
        'fechaRegistro',
        'fechaActualizacion',
    ];
}
