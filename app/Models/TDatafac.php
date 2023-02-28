<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDatafac extends Model
{
    protected $table='data_fac';
	protected $primaryKey='idDf';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnrof',
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
    ];
}
