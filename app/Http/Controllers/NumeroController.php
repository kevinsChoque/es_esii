<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TNumero;

class NumeroController extends Controller
{
    public function actNumero(Request $req)
    {
    	return view ('numero.numero');
    }
    public function actListar(Request $req)
    {
    	$registros = TNumero::all();
        return response()->json([
            "data"=>$registros,
        ]);
    }
    public function actRegistrar(Request $req)
    {
        $tNumero = TNumero::where('documento',$req->documento)->first();
        // dd($tNumero);
        $tNumero->numeroActual = '0';
        $tNumero->fill($req->all());
        if($tNumero->save())
        {
            return response()->json([
                "msg"=>"Operacion exitosa.",
                "estado"=>true,
                "data"=>$tNumero
            ]);
        }
    }
    
}
