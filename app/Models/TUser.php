<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUser extends Model
{
    protected $table='user';
	protected $primaryKey='idUser';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idPersona', 
        'usuario', 
        'password', 
        'cargoUser' ,
        'estado', 
        'fechaRegistro',
        'fechaActualizacion',
    ];
}
