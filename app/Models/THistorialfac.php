<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class THistorialfac extends Model
{
    protected $table='historial_fac';
	protected $primaryKey='idHf';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idFac', 
        'idPersona', 
        'fecha',
        'motivo',
        'estado',
    ];

    
}
