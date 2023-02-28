<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDp extends Model
{
    protected $table='detalle_plantilla';
	protected $primaryKey='idDp';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idPlantilla', 
        'idCp', 
        'orden',
        'cantidad',
    ];
}
