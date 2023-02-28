<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TCargo;

class CargoController extends Controller
{
    public function actListar()
    {
    	$registros = TCargo::select('cargo.*')->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
}
