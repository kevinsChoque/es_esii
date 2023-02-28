<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPresupuesto extends Model
{
    protected $table='presupuesto';
	protected $primaryKey='idPre';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnro', 
        'codigo', 
        'usuario', 
        'direccion', 
        'total',
        'estado',
        'culminacionProceso',
    ];

    // public function tConductor()
    // {   return $this->hasMany('App\Models\TConductor','idPersona');}
}
