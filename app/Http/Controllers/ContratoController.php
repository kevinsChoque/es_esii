<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\TSolicitud;
use App\Models\TPersona;
use App\Models\TContrato;

class ContratoController extends Controller
{
    public function actListarFromApp(Request $req)
    {
    	$listContrato = TSolicitud::Where('estadoProceso','=','6')->orderBy('fechaRegistro','desc')->get();
        return response()->json(["data"=>$listContrato,"estado"=>true]);
    }
    public function actDownload(Request $req,$solnro=null)
    {
        // dd($solnro);
        $ts = TSolicitud::where('solnro',$solnro)->first();
        if($ts!=null)
        {
	    	$firmador = TPersona::where('firma','1')->first();
	        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
	        $tp = new TemplateProcessor('plantillas/contrato_usuario.docx');
	        
	        $tp->setValue('nombreTit',$ts->nombreTit=='' || $ts->nombreTit==null?'':$ts->nombreTit);
	        $tp->setValue('dniTit',$ts->dniTit=='' || $ts->dniTit==null?'':$ts->dniTit);
	        $tp->setValue('domicilioTit',$ts->domicilioTit=='' || $ts->domicilioTit==null?'':$ts->domicilioTit);
	        $tp->setValue('numeroTit',$ts->numeroTit=='' || $ts->numeroTit==null?'':$ts->numeroTit);
	        $tp->setValue('manzanaTit',$ts->manzanaTit=='' || $ts->manzanaTit==null?'':$ts->manzanaTit);
	        $tp->setValue('loteTit',$ts->loteTit=='' || $ts->loteTit==null?'':$ts->loteTit);
	        $tp->setValue('urbanizacionTit',$ts->urbanizacionTit=='' || $ts->urbanizacionTit==null?'':$ts->urbanizacionTit);

	        $tp->setValue('nombreRep',$ts->nombreRep=='' || $ts->nombreRep==null?'':$ts->nombreRep);
	        $tp->setValue('dniRep',$ts->dniRep=='' || $ts->dniRep==null?'':$ts->dniRep);
	        $tp->setValue('domicilioRep',$ts->domicilioRep=='' || $ts->domicilioRep==null?'':$ts->domicilioRep);
	        $tp->setValue('numeroRep',$ts->numeroRep=='' || $ts->numeroRep==null?'':$ts->numeroRep);
	        $tp->setValue('manzanaRep',$ts->manzanaRep=='' || $ts->manzanaRep==null?'':$ts->manzanaRep);
	        $tp->setValue('loteRep',$ts->loteRep=='' || $ts->loteRep==null?'':$ts->loteRep);
	        $tp->setValue('urbanizacionRep',$ts->urbanizacionRep=='' || $ts->urbanizacionRep==null?'':$ts->urbanizacionRep);

	        $tp->setValue('firmador',$firmador->nombre.' '.$firmador->apellido);

	        $fileName='contrato.docx';
	        $tp->saveAs($fileName);
	        return response()->download($fileName)->deleteFileAfterSend(true);
        }
    }
    public function actSaveDataCon(Request $req)
    {
    	$ts = TSolicitud::where('solnro',$req->solnro)->first();
		$ts->fill($req->all());
		if($ts->save())
		{
			$tc = TContrato::where('solnro',$req->solnro)->first();
			if($tc!=null)
			{
				$tc->fill($req->all());
				if($tc->save())
				{   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
	            else
	            {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
			}
			else
			{
				$tc=TContrato::create($req->all());
			}
            if($tc!=null)
          	{   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
            else
            {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
		}
    }
    public function actShow(Request $req)
    {
    	// dd($req->all());
        $tc = TContrato::where('solnro',$req->solnro)->first();
    	$ts = TSolicitud::where('solnro',$req->solnro)->first();
        return response()->json([
        	"con"=>$tc!=null?$tc:'',
        	"sol"=>$ts,
        	"estado"=>true
        ]);
        // return response()->json(["data"=>"","estado"=>false]);
    }
}
