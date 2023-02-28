<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TFactibilidad extends Model
{
    protected $table='factibilidad';
	protected $primaryKey='idFac';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnro', 
        'codigo',
        'tipoPropiedad',
        'tipoConstruccion',
        'otros',
        'material',
        'numPisos',
        'numFamilias',
        'numHabitantes',
        'act',
        'tarifa',
        'unidad',
        'servicio',
        'formaPago',
        'motivo',
        'cuentaAlcantarillado',
        'dCuentaAlcantarillado',
        'cuenta',
        'periodicidad',
        'otros1',
        'cuentaPunto',
        'resultado',
        'motivo1',
        'obs',
        'atendido',
        'estado',
    ];
}
