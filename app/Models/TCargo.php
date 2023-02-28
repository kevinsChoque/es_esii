<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCargo extends Model
{
    protected $table='cargo';
	protected $primaryKey='idCargo';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'nombre', 
    ];
}
