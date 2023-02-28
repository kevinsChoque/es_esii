<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TSolicitud;

class ReporteController extends Controller
{
    public function actReporte()
    {
    	return view('reporte.reporte');
    }
    public function actRep1()
    {
    	return view('reporte.rep1');
    }
    public function actListarRep1()
    {
    	// $registros = TSolicitud::select('historial_fac.estado as este_estado_es','solicitud.*','factibilidad.*','historial_fac.fecha as fechaFactibilidad')
    	// 	->leftjoin('factibilidad','factibilidad.solnro','=','solicitud.solnro')
    	// 	->leftjoin('historial_fac','historial_fac.idFac','=','factibilidad.idFac')
    	// 	->where('historial_fac.estado','=','1')
    	// 	->whereNull('historial_fac.estado')
    	// 	->orderby('solicitud.numSoli','asc')
    	// 	->get();
    	$registros = TSolicitud::select('solicitud.*','factibilidad.*','historial_fac.fecha as fechaFactibilidad')
    		->leftjoin('factibilidad','factibilidad.solnro','=','solicitud.solnro')
    		->leftjoin('historial_fac','historial_fac.idFac','=','factibilidad.idFac')
    		->where('historial_fac.estado','=','1')
    		->orWhereNull('historial_fac.estado')
    		->orderby('solicitud.fechaRegistro','asc')
    		// ->orderby('solicitud.numSoli','asc')
    		->get();
    	return response()->json(["data"=>$registros,]);
    }
}
