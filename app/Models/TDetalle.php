<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDetalle extends Model
{
    protected $table='detalle';
	protected $primaryKey='idDetalle';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idPre', 
        'idCp', 
        'codigoCp', 
    ];
}
