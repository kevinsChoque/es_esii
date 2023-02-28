<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TContrato extends Model
{
    protected $table='contrato';
	protected $primaryKey='idContrato';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'solnro',
        
        'rucTit',
        'rucRep',
        'pciudad',
        'pfecha',
        'pficha',

        'aguaPot',
        'aguaPotDia',
        'alcSan',
        'alcSanDia',
        'tiempoConexion',
        'meses',
        'existe',

        'tipoConexion',
        'unidades',
        'suministro',
        'medidor',
        'fechaFacturacion',
        'tipoPago',
        'monto',
        'cuotaInicial',
        'plazo',
        'cuotas',
        'cuotaMensual',
        'interes',
        'garantia',
        'penalidad',
    ];
}
