<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCp extends Model
{
    protected $table='cuadro_presupuestal';
	protected $primaryKey='idCp';
	public $incrementing=true;
	public $timestamps=false;
}
