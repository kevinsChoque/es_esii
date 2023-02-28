<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCp;

class CpController extends Controller
{
    public function actListar(Request $req)
    {
    	$registros = TCp::select('*')
            ->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
    public function actCp()
    {
    	return view('cp.cp');
    }
    public function actSaveEditTarifa(Request $req)
    {
        $tCp = TCp::find($req->id);
        $tCp->tarifa = $req->newTarifa;
        // if(true)
        if($tCp->save())
        {
            return response()->json([
                "msg"=>"Se guardo el cambio de tarifa.",
                "estado"=>true
            ]);
        }
        else
        {
            return response()->json([
                "msg"=>"Ocurrio una inconsistencia.",
                "estado"=>false
            ]);
        }
    }
}
