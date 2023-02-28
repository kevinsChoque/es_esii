<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TUser;
use App\Models\TPersona;

class UserController extends Controller
{
	public function agregarCampAdi($model,$act)
    {
        if($act)
        {
            $model->estado='1';
            $model->fechaRegistro=now();
        }
        else
        {
            $model->fechaActualizacion=now();
        }
        return $model->save();
    }
    public function actUser()
    {
    	return view('user.user');
    }
    public function actListar()
    {
    	$registros = TUser::select('persona.*','user.*')
            ->join('persona','persona.idPersona','=','user.idPersona')
            ->orderBy('user.idUser', 'DESC')
            ->get();
    	return response()->json(["data"=>$registros]);
    }
    public function actRegistrar(Request $req)
    {
    	// dd($req->all());
    	$tu=TUser::create($req->all());
        if($this->agregarCampAdi($tu,1))
        {
            return response()->json([
                "msg"=>"Operacion exitosa.",
                "estado"=>true,
                "persona"=>$tu,
            ]);
        }
        return response()->json([
            "msg"=>"Error en fecha de registro.",
            "estado"=>false
        ]);
    }
    public function actEliminar(Request $req)
    {
        $tu = TUser::find($req->id);
        if($tu->delete())
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
    public function actEditar(Request $req)
    {
        $registro = TUser::find($req->id);
        $lp = TPersona::select('persona.*','cargo.nombre as nombreCargo')
            ->leftjoin('user', 'user.idPersona', '=', 'persona.idPersona')
            ->leftjoin('cargo', 'cargo.idCargo', '=', 'persona.idCargo')
            ->whereNull('user.idUser')
            ->orWhere('user.idUser', $req->id)
            ->orderBy('persona.idPersona', 'DESC')
            ->get();
        // return response()->json(["data"=>$registros]);
        return response()->json(["data"=>$registro,"personas"=>$lp]);
    }
    public function actGuardarCambios(Request $req)
    {
    	// dd($req->all());
        $tu = TUser::find($req->idUser);
        $tu->fill($req->all());
        if($tu->save() && $this->agregarCampAdi($tu,0))
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
        	return response()->json(["msg"=>"No fue posible guardar los cambios.","estado"=>false]);
    }
    public function actChangeState(Request $req)
    {
    	$tu = TUser::find($req->id);
    	$tu->estado=$tu->estado=='1'?'0':'1';
        if($tu->save())
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
}
