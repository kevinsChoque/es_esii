<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCliente extends Model
{
    protected $table='cliente';
	protected $primaryKey='idCliente';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'dni', 
        'nombre',
        'apellido',
    ];
}
