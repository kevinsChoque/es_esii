<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPlantilla;
use App\Models\TDp;
use DB;

class PlantillaController extends Controller
{
	public function actPlantilla(Request $req)
    {
    	return view ('plantilla.plantilla');
    }
    public function actListar()
    {
    	// SELECT p.idPlantilla,p.nombre,count(d.idDp) FROM plantilla p inner join detalle_plantilla d on p.idPlantilla=d.idPlantilla GROUP by p.idPlantilla
    	$sql = "SELECT p.idPlantilla,p.nombre,p.descripcion,p.tipoTerreno,p.tipoConexion,p.diametro,p.fr,p.fa,count(d.idDp) as cantidad FROM plantilla p inner join detalle_plantilla d on p.idPlantilla=d.idPlantilla GROUP by p.idPlantilla,p.nombre,p.descripcion,p.tipoTerreno,p.tipoConexion,p.diametro,p.fr,p.fa order by p.idPlantilla desc";
        $data=DB::select($sql);
        // return response()->json(["data"=>$data]);
    	// $list=TPlantilla::all();
    	return response()->json([
            "data"=>$data,
        ]);
    }
	public function agregarCampAdi($model,$act)
    {
        if($act)
        {$model->fr=now();}
        else
        {$model->fa=now();}
        return $model->save();
    }
    public function saveEditDetalle($req,$idPlantilla)
    {
        $detalles=TDp::where('idPlantilla',$idPlantilla)->get();
        if($detalles!=null)
        {
            foreach ($detalles as $detalle) 
            {
                if(!$detalle->delete())
                {
                    return false;
                }
            }
        }
        return $this->saveDetalle($req,$idPlantilla);
    }
    public function saveDetalle($req,$idPlantilla)
    {
        // dd($req->all());
        if($req->ids!=null)
        {
            for ($i=0; $i < count($req->ids); $i++) 
            { 
            	$d=new TDp();
                $d->idPlantilla=$idPlantilla;
                $d->idCp=$req->ids[$i];
                $d->orden=$req->ordenes[$i];
                $d->cantidad=$req->cantidades[$i];
                if(!$d->save())
                {
                    return false;
                }
            }
        }
        return true;
    }
    public function actRegistrar(Request $req)
    {
    	// dd($req->all());
    	$tPla=TPlantilla::create($req->all());
        if($this->agregarCampAdi($tPla,1))
        {
            if($this->saveDetalle($req,$tPla->idPlantilla))
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
        }
        return response()->json([
            "msg"=>"No fue posible registrar la empresa.",
            "estado"=>false
        ]);
    }
    public function actEliminar(Request $req)
    {
        $tPla = TPlantilla::find($req->id);
        if($tPla->delete())
        {return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        else
        {return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);}
    }
    public function actShow(Request $req)
    {
        $data = TPlantilla::select('cuadro_presupuestal.idCp',
    		'cuadro_presupuestal.codigo',
    		'cuadro_presupuestal.actividad',
    		'cuadro_presupuestal.unidad',
    		'cuadro_presupuestal.especificacion',
    		'cuadro_presupuestal.tarifa',
    		'cuadro_presupuestal.medio',
    		'cuadro_presupuestal.unidadRendimiento',
            'detalle_plantilla.cantidad',
    		)
        	->join('detalle_plantilla', 'detalle_plantilla.idPlantilla', '=', 'plantilla.idPlantilla')
        	->join('cuadro_presupuestal', 'cuadro_presupuestal.idCp', '=', 'detalle_plantilla.idCp')
        	->where('plantilla.idPlantilla','=',$req->id)
        	->orderBy('detalle_plantilla.orden', 'desc')
        	->get();
        return response()->json([
            "data"=>$data,
        ]);
    }
    public function actEditar(Request $req)
    {
    	// dd('esta ki en actEditar');
        $registro = TPlantilla::find($req->id);
        $list = TDp::where('idPlantilla',$req->id)->get();
        $list = TDp::select('cuadro_presupuestal.*','detalle_plantilla.*')
        	->join('cuadro_presupuestal', 'cuadro_presupuestal.idCp', '=', 'detalle_plantilla.idCp')
        	->where('detalle_plantilla.idPlantilla',$req->id)
        	->get();
        return response()->json([
            "data"=>$registro,
            "list"=>$list
        ]);
    }
    public function actGuardarCambios(Request $req)
    {
        $tPla = TPlantilla::find($req->idPlantilla);
        $tPla->fill($req->all());
        if($tPla->save() && $this->agregarCampAdi($tPla,0))
        {
            if($this->saveEditDetalle($req,$tPla->idPlantilla))
            {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        }
    }
}
