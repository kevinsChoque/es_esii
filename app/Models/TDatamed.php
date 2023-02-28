<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDatamed extends Model
{
    protected $table='data_med';
	protected $primaryKey='idDm';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnromedicion',
        'estado',
    ];
}
