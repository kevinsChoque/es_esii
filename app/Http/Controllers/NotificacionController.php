<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TFactibilidad;
use App\Models\TSolicitud;
use App\Models\THistorialfac;

class NotificacionController extends Controller
{
    public function actEnviarFactibilidad(Request $req)
    {
    	$tf = TFactibilidad::find($req->idFac);
    	$ts = TSolicitud::where('solnro',$tf->solnro)->first();

    	$tt = THistorialfac::select('persona.*','historial_fac.fecha')
    		->join('persona','persona.idPersona','=','historial_fac.idPersona')
    		->where('historial_fac.idFac',$req->idFac)
    		->where('historial_fac.estado','1')
    		->first();
    	return response()->json([
                "solicitud"=>$ts,
                "tecnico"=>$tt,
                "fechaFactibilidad"=>$tt->fecha,
            ]);
    	// dd($req->all());
    }
}
