<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TMedicion extends Model
{
    protected $table='medicion';
	protected $primaryKey='idMed';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnro', 
        'idPersona',
        'fecha', 
        'estado',

        'diametroTuberiaA',
        'otros1',
        'longuitudAgua',
        'diametroAgua',
        'cat',
        'dat',
        'ddat',
        'cap',
        'dap',
        'ddap',
        'cav',
        'dav',
        'ddav',
        'cae',
        'dae',
        'ddae',
        'cao',
        'dao',
        'ddao',
        'tipoPredio',
        'obs1',
        
        'diametroTuberiaD',
        'otros2',
        'longuitudDesague',
        'diametroDesague',
        'profundidad',
        'cdt',
        'ddt',
        'dddt',
        'cdp',
        'ddp',
        'dddp',
        'cdv',
        'ddv',
        'dddv',
        'cde',
        'dde',
        'ddde',
        'cdo',
        'ddo',
        'dddo',
        'calidadAgua',
        'obs2',
    ];
}
