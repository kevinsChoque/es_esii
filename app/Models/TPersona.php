<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPersona extends Model
{
    protected $table='persona';
	protected $primaryKey='idPersona';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idCargo', 
        'doc', 
        'tipoDoc', 
        'ruc', 
        'nombre',
        'apellido',
        'celular',
        'correo',
        'domicilio',
        'fechaNacimiento',
    ];
}
