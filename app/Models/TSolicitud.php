<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSolicitud extends Model
{
    protected $table='solicitud';
	protected $primaryKey='solnro';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
    	'solnro',
    	'solnro1',
    	'hora',
    	'numSoli',
        'fechaSoli',
        'fechaVencimiento',
        'lugar',
        'fecha',
        'empresa',
        'numRecibo',

    	'nombreTit',
		'dniTit',
		'correoTit',
		'domicilioTit',
		'numeroTit',
		'manzanaTit',
		'loteTit',
		'urbanizacionTit',

		'nombreRep',
		'dniRep',
		'correoRep',
		'domicilioRep',
		'numeroRep',
		'manzanaRep',
		'loteRep',
		'urbanizacionRep',
		'tipoPredio',
		'ubicacionPre',
		'numeroPre',
		'manzanaPre',
		'lotePre',
		'referenciaPre',
		'ts1',
		'ts2',
		'categoria',
		'usoServicio',
		'numeroMeses',
		'item1',
		'item2',
		'item3',
		'item4',
		'item5',
		'item6',
		'otros',
		'telefono',
		'telefonoAlternativo',

		'fechaRegistro',
		'fechaActualizacion',
    ];
}
