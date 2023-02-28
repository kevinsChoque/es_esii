<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\TSolicitud;
use App\Models\TNumero;
use App\Models\TFactibilidad;

class SolController extends Controller
{
    public function agregarCampAdi($model,$act)
    {
        if($act)
        {
            $model->fechaRegistro=now();
        }
        else
        {
            $model->fechaActualizacion=now();
        }
        return $model->save();
    }
    public function actSol(Request $req)
    {
    	return view('solicitud.solicitud');
    }
    public function actDownload(Request $req)
    {
    	$dateActual = date("d-m-Y");
    	// dd($req->all());
        // ----------------------
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        // ------------------------------
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $tp = new TemplateProcessor('plantillas/solicitud.docx');
        // ----------------------
        $tp->setValue('solnro',$req->solnroSend);
		$tp->setValue('solnombre',$req->solnombre);
		$tp->setValue('soltipcal',$req->soltipcal);
		$tp->setValue('soldirec',$req->soldirec);
		$tp->setValue('soldirnro',$req->soldirnro);
		$tp->setValue('soldircom',$req->soldircom);
		$tp->setValue('solurban',$req->solurban);
		$tp->setValue('solelect',$req->solelect);
		$tp->setValue('solfex',$req->solfex);
		// $tp->setValue('soltelef',$req->soltelef);
		// $tp->setValue('dateVencimiento',str_replace('-','/',date("d-m-Y",strtotime($dateActual."+ 1 month"))));
		$tp->setValue('hora',$req->docHora);
        // ------------------------
        $tNumero = TNumero::where('documento','Solicitud')->first();
        if($tNumero->estado=='1')
        {
            if($tNumero->numeroActual=='0')
            {
                $numeroSolicitud=(int)$tNumero->numero+1;
            }
            else
            {
                $numeroSolicitud=(int)$tNumero->numeroActual+1;
            }
            $tp->setValue('numeroSolicitud',date("Y").'-'.$numeroSolicitud);
            $tNumero->numeroActual = $numeroSolicitud;
            $tNumero->save();
        }
        else
        {
            $tp->setValue('numeroSolicitud','');
        }

        $ts = TSolicitud::find($req->solnroSend);
        if($ts!=null)
        {
            // 'solnro',
            // $tp->setValue('dateVencimiento',$ts->fechaVencimiento);
            $tp->setValue('repnombre',$ts->nombreRep=='' || $ts->nombreRep==null?'':$ts->nombreRep);
            $tp->setValue('repdni',$ts->dniRep=='' || $ts->dniRep==null?'':$ts->dniRep);
            $tp->setValue('repcorreo',$ts->correoRep=='' || $ts->correoRep==null?'':$ts->correoRep);
            $tp->setValue('repdireccion',$ts->domicilioRep=='' || $ts->domicilioRep==null?'':$ts->domicilioRep);
            $tp->setValue('repnumero',$ts->numeroRep=='' || $ts->numeroRep==null?'':$ts->numeroRep);
            $tp->setValue('repmanzana',$ts->manzanaRep=='' || $ts->manzanaRep==null?'':$ts->manzanaRep);
            $tp->setValue('replote',$ts->loteRep=='' || $ts->loteRep==null?'':$ts->loteRep);
            $tp->setValue('repurban',$ts->urbanizacionRep=='' || $ts->urbanizacionRep==null?'':$ts->urbanizacionRep);
            // 'tipoPredio',
            $tp->setValue('preo1',$ts->tipoPredio=='En construccion' ? 'X': '');
            $tp->setValue('preo2',$ts->tipoPredio=='Habilitado' ? 'X': '');
            $tp->setValue('preo3',$ts->tipoPredio=='Otros' ? 'X': '');

            $tp->setValue('preubicacion',$ts->ubicacionPre=='' || $ts->ubicacionPre==null?'':$ts->ubicacionPre);
            $tp->setValue('prenumero',$ts->numeroPre=='' || $ts->numeroPre==null?'':$ts->numeroPre);
            $tp->setValue('premanzana',$ts->manzanaPre=='' || $ts->manzanaPre==null?'':$ts->manzanaPre);
            $tp->setValue('prelote',$ts->lotePre=='' || $ts->lotePre==null?'':$ts->lotePre);
            $tp->setValue('prereferencia',$ts->referenciaPre=='' || $ts->referenciaPre==null?'':$ts->referenciaPre);

            $tp->setValue('pban1',$ts->ts1=='true' ? 'X': '');
            $tp->setValue('pban2',$ts->ts2=='true' ? 'X': '');
            // 'categoria',
            $tp->setValue('pcat1',$ts->categoria=='Domestico' ? 'X': '');
            $tp->setValue('pcat2',$ts->categoria=='Social' ? 'X': '');
            $tp->setValue('pcat3',$ts->categoria=='Comercial y Otros' ? 'X': '');
            $tp->setValue('pcat4',$ts->categoria=='Industrial' ? 'X': '');
            $tp->setValue('pcat5',$ts->categoria=='Estatal' ? 'X': '');
            // 'usoServicio',
            $tp->setValue('puso1',$ts->usoServicio=='Permanente' ? 'X': '');
            $tp->setValue('puso2',$ts->usoServicio=='Temporal' ? 'X': '');
            $tp->setValue('pmeses',$ts->numeroMeses=='' || $ts->numeroMeses==null?'':$ts->numeroMeses);
            
            $tp->setValue('item1',$ts->item1=='true' ? 'X': '');
            $tp->setValue('item2',$ts->item2=='true' ? 'X': '');
            $tp->setValue('item3',$ts->item3=='true' ? 'X': '');
            $tp->setValue('item4',$ts->item4=='true' ? 'X': '');
            $tp->setValue('item5',$ts->item5=='true' ? 'X': '');
            $tp->setValue('item6',$ts->item6=='true' ? 'X': '');

            $tp->setValue('otros',$ts->otros=='' || $ts->otros==null?'':$ts->otros);

            $tp->setValue('soltelef',$ts->telefono=='' || $ts->telefono==null?'':$ts->telefono);
            $tp->setValue('telefonoAlternativo',$ts->telefonoAlternativo=='' || $ts->telefonoAlternativo==null?'':$ts->telefonoAlternativo);

        }
        else
        {
            // $tp->setValue('dateVencimiento',str_replace('-','/',date("d-m-Y",strtotime($dateActual."+ 1 month"))));
            $tp->setValue('repnombre','');
            $tp->setValue('repdni','');
            $tp->setValue('repcorreo','');
            $tp->setValue('repdireccion','');
            $tp->setValue('repnumero','');
            $tp->setValue('repmanzana','');
            $tp->setValue('replote','');
            $tp->setValue('repurban','');
            // 'tipoPredio',
            $tp->setValue('preo1','');
            $tp->setValue('preo2','');
            $tp->setValue('preo3','');

            $tp->setValue('preubicacion','');
            $tp->setValue('prenumero','');
            $tp->setValue('premanzana','');
            $tp->setValue('prelote','');
            $tp->setValue('prereferencia','');

            $tp->setValue('pban1','');
            $tp->setValue('pban2','');
            // 'categoria',
            $tp->setValue('pcat1','');
            $tp->setValue('pcat2','');
            $tp->setValue('pcat3','');
            $tp->setValue('pcat4','');
            $tp->setValue('pcat5','');
            // 'usoServicio',
            $tp->setValue('puso1','');
            $tp->setValue('puso2','');
            $tp->setValue('pmeses','');

            $tp->setValue('item1','');
            $tp->setValue('item2','');
            $tp->setValue('item3','');
            $tp->setValue('item4','');
            $tp->setValue('item5','');
            $tp->setValue('item6','');

            $tp->setValue('otros','');

            $tp->setValue('soltelef','');
            $tp->setValue('telefonoAlternativo','');
        }
        // $newFecha=explode("-", $ts->fechaVencimiento);
        // $fecha1=$newFecha[2].'/'.$newFecha[1].'/'.$newFecha[0];
        $fechaDefecto=str_replace('-','/',date("d-m-Y",strtotime($dateActual."+ 1 month")));
        $tp->setValue('dateVencimiento',$ts!=null && $ts->fechaVencimiento!='' && $ts->fechaVencimiento!=null ? explode("-", $ts->fechaVencimiento)[2].'/'.explode("-", $ts->fechaVencimiento)[1].'/'.explode("-", $ts->fechaVencimiento)[0]:$fechaDefecto);

        $tp->setValue('solfirmador',$ts!=null && $ts->nombreRep!='' && $ts->nombreRep!=null && $ts->dniRep!='' && $ts->dniRep!=null?$ts->nombreRep:$req->solnombre);
        $tp->setValue('solfirmadni',$ts!=null && $ts->nombreRep!='' && $ts->nombreRep!=null && $ts->dniRep!='' && $ts->dniRep!=null?$ts->dniRep:$req->solelect);
        // $tp->setValue('solnombre','$req->solnombre');
        // ---------------------

        $fileName='solicitud.docx';
        $tp->saveAs($fileName);
        // ----------------
        $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath); 
        $savePdfPath = public_path('new-result.pdf');
        if ( file_exists($savePdfPath) ) {
            unlink($savePdfPath);
        }
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($savePdfPath); 
        return response()->download($savePdfPath)->deleteFileAfterSend(true);
        // --------------------------------------
        // return response()->download($fileName)->deleteFileAfterSend(true);
    }
    public function actRegistrar(Request $req)
    {
        // dd($req->all());
        $ts = TSolicitud::find($req->solnro);
        if($ts==null)
        {
            $req['fechaRegistro']=now();
            $ts=TSolicitud::create($req->all());
            $tn=TNumero::where('documento','Solicitud')->first();
            // ----
            $tn->numeroActual=explode("-", $req->numSoli)[1];
            if($tn->save())
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
            else
            {
                return response()->json([
                    "msg"=>"Error al momento de guardar numero correlativo.",
                    "estado"=>false
                ]);
            }
            // ---
            // return response()->json([
            //     "msg"=>"Operacion exitosa.",
            //     "estado"=>true
            // ]);
        }
        else
        {
            $req['fechaActualizacion']=now();
            $ts->fill($req->all());
            if($ts->save())
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
        }
    }
    public function actGeFactibilidad(Request $req)
    {
        dd('aki es');
        $serverName = 'informatica2-pc\sicem_bd';
        $connectionInfo = array(
            "Database"=>"SICEM_AB",
            "UID"=>"comercial",
            "PWD"=>"1",
            "CharacterSet"=>"UTF-8"
        );
        $tf = TFactibilidad::find($req->solnro);
        if($tf==null)
        {
            $req['estado'] = 1;
            $tf=TFactibilidad::create($req->all());
            $conn_sis = sqlsrv_connect($serverName,$connectionInfo);
            if($conn_sis)
            {
                $sql = "EXECUTE testEsi '$req->solnro', '2';";
                if($stmt = sqlsrv_query($conn_sis, $sql))
                {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
                else
                {   return response()->json(["msg"=>"Paso algo al momento de ejecutar procedimiento.","estado"=>true]);}
            }
            else
            {   return response()->json(["msg"=>"Error en la conexion a la BD principal.","estado"=>true]);}
            
        }
        else
        {
            $tf->fill($req->all());
            if($tf->save())
            {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        }
    }
    
    public function actShow(Request $req)
    {
        $tn = TNumero::where('documento','Solicitud')->first();
        if($tn->estado!=0)
        {
            if($tn->numeroActual!=0)
                $numeroCorrelativo=(int)$tn->numeroActual+1;
            else
                $numeroCorrelativo=(int)$tn->numero+1;
        }

        $ts = TSolicitud::find($req->solnro);
        if($ts!=null)
            return response()->json(["data"=>$ts,
                "estado"=>true,
            ]);
        else
            return response()->json(["data"=>"",
                "estado"=>false,
                'numeroCorrelativo'=>$numeroCorrelativo
            ]);
    }
    public function actShowFactibilidad(Request $req)
    {
        // dd($req->all());
        $tf = TFactibilidad::where('solnro',$req->solnro)->first();
        // dd($tf);
        if($tf!=null)
            return response()->json(["data"=>$tf,"estado"=>true]);
        else
            return response()->json(["data"=>"","estado"=>false]);
    }
    public function actListar()
    {
        $serverName = 'informatica2-pc\sicem_bd';
        $connectionInfo = array(
            "Database"=>"SICEM_AB",
            "UID"=>"comercial",
            "PWD"=>"1",
            "CharacterSet"=>"UTF-8"
        );
        $conn_sis = sqlsrv_connect($serverName,$connectionInfo);

        if($conn_sis)
        {
            $tsql = "select * from regsoli r
                    where r.SolFec=CONVERT(varchar,GETDATE(),5) and r.SerCod='1005'";
            $stmt = sqlsrv_query($conn_sis, $tsql); 
            $arreglo = array(); 
            $html='';
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
            {
                $arreglo[] = $row;
                if($row['estado']>='2')
                {
                    $banFactibilidad = '<button type="button" class="btn text-success" title="La fecha de Factibilidad ya fue programada"><i class="fa-solid fa-business-time"></i></button>';
                }
                else
                {
                    $banFactibilidad = '<button type="button" class="btn text-secondary" title="Programar factivilidad" onclick="regFactibilidad('.$row['SolNro'].')"><i class="fa-solid fa-business-time"></i></button>';
                }
                $fechaFormat = date("d/m/Y",$row['SolFex']->getTimestamp());
                $html=$html.'<tr class="text-center">'.
                    '<td class="font-weight-bold">'.$row['SolNro'].'</td>'.
                    '<td class="font-weight-bold">'.$row['SolElect'].'</td>'.
                    '<td>'.$row['SolNombre'].'</td>'.
                    '<td>'.$row['SolTipCal'].$row['SolDirec'].$row['SolDirNro'].'</td>'.
                    '<td>'.
                        '<div class="btn-group btn-group-sm" role="group">'.
                            $banFactibilidad.
                            '<button type="button" class="btn text-info" title="Editar archivo" onclick="registrarAdicional('.$row['SolNro'].')"><i class="fa fa-edit" ></i></button>'.
                            '<a class="btn text-info" title="Descargar documento" onclick="sendData('.$row['SolNro'].')" id="'.$row['SolNro'].'" 
                            data-solnro="'.$row['SolNro'].'" data-solnombre="'.$row['SolNombre'].'" data-soltipcal="'.$row['SolTipCal'].'" data-soldirec="'.$row['SolDirec'].'" data-soldirnro="'.$row['SolDirNro'].'" data-soldircom="'.$row['SolDirCom'].'" data-solurban="'.$row['SolUrban'].'" data-solelect="'.$row['SolElect'].'" data-solfex="'.$fechaFormat.'" data-soltelef="'.$row['SolTelef'].'"><i class="fa fa-download"></i></a>'.
                        '</div>'.
                    '</td>'.
                '</tr>';
            }
            // echo $html;
            return response()->json([
                "data"=>$arreglo,
            ]);
        }
        else
        {
            echo("fallo");
            die(print_r(sqlsrv_errors(),true));
        }
        // $registros = TPersona::select('persona.*','cargo.nombre as nombreCargo')
        //     ->leftjoin('cargo','cargo.idCargo','=','persona.idCargo')
        //     ->where('persona.estado','!=','-')
        //     ->orderBy('persona.idPersona', 'DESC')
        //     ->get();
        // return response()->json([
        //         "data"=>$registros,
        //     ]);
    }
    public function actSaveNewSoli(Request $req)
    {
        $req['fechaRegistro']=now();
        $id = Str::uuid()->toString();
        $req['solnro']=$id;
        $req['solnro1']=$id;
        $ts=TSolicitud::create($req->all());
        if($ts->save())
        {
            $tn=TNumero::where('documento','Solicitud')->first();
            $tn->numeroActual=explode("-", $req->numSoli)[1];
            if($tn->save())
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
            else
            {
                return response()->json([
                    "msg"=>"Error al momento de guardar numero correlativo.",
                    "estado"=>false
                ]);
            }
        }
        else
        {
            return response()->json([
                "msg"=>"Error en fecha de registro.",
                "estado"=>false
            ]);
        }
    }
    public function actShowNumCorrelativo()
    {
        $tn = TNumero::where('documento','Solicitud')->first();
        if($tn->estado!=0)
        {
            if($tn->numeroActual!=0)
                return response()->json(["numeroCorrelativo"=>(int)$tn->numeroActual+1,"estado"=>true]);
            else
                return response()->json(["numeroCorrelativo"=>(int)$tn->numero+1,"estado"=>true]);

        }
    }
    public function actListarFromApp()
    {
        $listSoli = TSolicitud::whereNull('estadoProceso')
            ->orWhere('estadoProceso','=','1')
            ->whereNull('estado')
            ->orderBy('fechaRegistro','desc')
            ->get();
        return response()->json(["data"=>$listSoli,"estado"=>true]);
    }
    public function actSolDownload(Request $req,$solnro=null)
    {
        // ----------------------
        // $domPdfPath = base_path('vendor/dompdf/dompdf');
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        // ------------------------------
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $tp = new TemplateProcessor('plantillas/newSolicitud.docx');
        $ts = TSolicitud::where('solnro',$solnro)->first();
        
        if($ts!=null)
        {
            // 'solnro',
            // $tp->setValue('dateVencimiento',$ts->fechaVencimiento);
            $tp->setValue('hora',$ts->hora=='' || $ts->hora==null?'':$ts->hora);
            $tp->setValue('numSoli',$ts->numSoli=='' || $ts->numSoli==null?'':$ts->numSoli);
            $tp->setValue('fechaSoli',$ts->fechaSoli=='' || $ts->fechaSoli==null?'':$ts->fechaSoli);
            $tp->setValue('fechaVencimiento',$ts->fechaVencimiento=='' || $ts->fechaVencimiento==null?'':$ts->fechaVencimiento);
            $tp->setValue('lugar',$ts->lugar=='' || $ts->lugar==null?'':$ts->lugar);
            $tp->setValue('fecha',$ts->fecha=='' || $ts->fecha==null?'':$ts->fecha);
            $tp->setValue('empresa',$ts->empresa=='' || $ts->empresa==null?'':$ts->empresa);
            $tp->setValue('numRecibo',$ts->numRecibo=='' || $ts->numRecibo==null?'':$ts->numRecibo);

            $tp->setValue('nombreTit',$ts->nombreTit=='' || $ts->nombreTit==null?'':$ts->nombreTit);
            $tp->setValue('dniTit',$ts->dniTit=='' || $ts->dniTit==null?'':$ts->dniTit);
            $tp->setValue('correoTit',$ts->correoTit=='' || $ts->correoTit==null?'':$ts->correoTit);
            $tp->setValue('domicilioTit',$ts->domicilioTit=='' || $ts->domicilioTit==null?'':$ts->domicilioTit);
            $tp->setValue('numeroTit',$ts->numeroTit=='' || $ts->numeroTit==null?'':$ts->numeroTit);
            $tp->setValue('manzanaTit',$ts->manzanaTit=='' || $ts->manzanaTit==null?'':$ts->manzanaTit);
            $tp->setValue('loteTit',$ts->loteTit=='' || $ts->loteTit==null?'':$ts->loteTit);
            $tp->setValue('urbanizacionTit',$ts->urbanizacionTit=='' || $ts->urbanizacionTit==null?'':$ts->urbanizacionTit);

            $tp->setValue('nombreRep',$ts->nombreRep=='' || $ts->nombreRep==null?'':$ts->nombreRep);
            $tp->setValue('dniRep',$ts->dniRep=='' || $ts->dniRep==null?'':$ts->dniRep);
            $tp->setValue('correoRep',$ts->correoRep=='' || $ts->correoRep==null?'':$ts->correoRep);
            $tp->setValue('domicilioRep',$ts->domicilioRep=='' || $ts->domicilioRep==null?'':$ts->domicilioRep);
            $tp->setValue('numeroRep',$ts->numeroRep=='' || $ts->numeroRep==null?'':$ts->numeroRep);
            $tp->setValue('manzanaRep',$ts->manzanaRep=='' || $ts->manzanaRep==null?'':$ts->manzanaRep);
            $tp->setValue('loteRep',$ts->loteRep=='' || $ts->loteRep==null?'':$ts->loteRep);
            $tp->setValue('urbanizacionRep',$ts->urbanizacionRep=='' || $ts->urbanizacionRep==null?'':$ts->urbanizacionRep);

            // 'tipoPredio',
            $tp->setValue('preo1',$ts->tipoPredio=='En construccion' ? 'X': '');
            $tp->setValue('preo2',$ts->tipoPredio=='Habilitado' ? 'X': '');
            $tp->setValue('preo3',$ts->tipoPredio=='Otros' ? 'X': '');

            $tp->setValue('ubicacionPre',$ts->ubicacionPre=='' || $ts->ubicacionPre==null?'':$ts->ubicacionPre);
            $tp->setValue('numeroPre',$ts->numeroPre=='' || $ts->numeroPre==null?'':$ts->numeroPre);
            $tp->setValue('manzanaPre',$ts->manzanaPre=='' || $ts->manzanaPre==null?'':$ts->manzanaPre);
            $tp->setValue('lotePre',$ts->lotePre=='' || $ts->lotePre==null?'':$ts->lotePre);
            $tp->setValue('referenciaPre',$ts->referenciaPre=='' || $ts->referenciaPre==null?'':$ts->referenciaPre);

            $tp->setValue('pban1',$ts->ts1=='true' ? 'X': '');
            $tp->setValue('pban2',$ts->ts2=='true' ? 'X': '');
            // 'categoria',
            $tp->setValue('pcat1',$ts->categoria=='Domestico' ? 'X': '');
            $tp->setValue('pcat2',$ts->categoria=='Social' ? 'X': '');
            $tp->setValue('pcat3',$ts->categoria=='Comercial y Otros' ? 'X': '');
            $tp->setValue('pcat4',$ts->categoria=='Industrial' ? 'X': '');
            $tp->setValue('pcat5',$ts->categoria=='Estatal' ? 'X': '');
            // 'usoServicio',
            $tp->setValue('puso1',$ts->usoServicio=='Permanente' ? 'X': '');
            $tp->setValue('puso2',$ts->usoServicio=='Temporal' ? 'X': '');
            $tp->setValue('numeroMeses',$ts->numeroMeses=='' || $ts->numeroMeses==null?'':$ts->numeroMeses);
            
            $tp->setValue('item1',$ts->item1=='true' ? 'X': '');
            $tp->setValue('item2',$ts->item2=='true' ? 'X': '');
            $tp->setValue('item3',$ts->item3=='true' ? 'X': '');
            $tp->setValue('item4',$ts->item4=='true' ? 'X': '');
            $tp->setValue('item5',$ts->item5=='true' ? 'X': '');
            $tp->setValue('item6',$ts->item6=='true' ? 'X': '');

            $tp->setValue('otros',$ts->otros=='' || $ts->otros==null?'':$ts->otros);

            $tp->setValue('telefono',$ts->telefono=='' || $ts->telefono==null?'':$ts->telefono);
            $tp->setValue('telefonoAlternativo',$ts->telefonoAlternativo=='' || $ts->telefonoAlternativo==null?'':$ts->telefonoAlternativo);

        }
        else
        {
            // $tp->setValue('dateVencimiento',str_replace('-','/',date("d-m-Y",strtotime($dateActual."+ 1 month"))));
            $tp->setValue('repnombre','');
            $tp->setValue('repdni','');
            $tp->setValue('repcorreo','');
            $tp->setValue('repdireccion','');
            $tp->setValue('repnumero','');
            $tp->setValue('repmanzana','');
            $tp->setValue('replote','');
            $tp->setValue('repurban','');
            // 'tipoPredio',
            $tp->setValue('preo1','');
            $tp->setValue('preo2','');
            $tp->setValue('preo3','');

            $tp->setValue('preubicacion','');
            $tp->setValue('prenumero','');
            $tp->setValue('premanzana','');
            $tp->setValue('prelote','');
            $tp->setValue('prereferencia','');

            $tp->setValue('pban1','');
            $tp->setValue('pban2','');
            // 'categoria',
            $tp->setValue('pcat1','');
            $tp->setValue('pcat2','');
            $tp->setValue('pcat3','');
            $tp->setValue('pcat4','');
            $tp->setValue('pcat5','');
            // 'usoServicio',
            $tp->setValue('puso1','');
            $tp->setValue('puso2','');
            $tp->setValue('pmeses','');

            $tp->setValue('item1','');
            $tp->setValue('item2','');
            $tp->setValue('item3','');
            $tp->setValue('item4','');
            $tp->setValue('item5','');
            $tp->setValue('item6','');

            $tp->setValue('otros','');

            $tp->setValue('soltelef','');
            $tp->setValue('telefonoAlternativo','');
        }
        if($ts!=null && 
            $ts->nombreTit!='' && 
            $ts->nombreTit!=null && 
            $ts->dniTit!='' && 
            $ts->dniTit!=null)
        {
            $tp->setValue('solfirmador',$ts->nombreTit);
            $tp->setValue('solfirmadni',$ts->dniTit);
        }
        else
        {
            $tp->setValue('solfirmador',$ts!=null && $ts->nombreRep!='' && $ts->nombreRep!=null && $ts->dniRep!='' && $ts->dniRep!=null?$ts->nombreRep:'');
            $tp->setValue('solfirmadni',$ts!=null && $ts->nombreRep!='' && $ts->nombreRep!=null && $ts->dniRep!='' && $ts->dniRep!=null?$ts->dniRep:'');
        }

        $fileName='test.doc';
        $tp->saveAs($fileName);
        // $tp->save($fileName,'PDF');
        // ----------------
        // $Content = \PhpOffice\PhpWord\IOFactory::load($fileName); 
        // $savePdfPath = public_path('new-result.pdf');
        // if ( file_exists($savePdfPath) ) {
        //     unlink($savePdfPath);
        // }
        // $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        // $PDFWriter->save($savePdfPath); 
        // return response()->download($savePdfPath)->deleteFileAfterSend(true);
        // --------------------------------------  
        return response()->download($fileName)->deleteFileAfterSend(false);
    }
    public function actEliminar(Request $req)
    {
        // dd(Str::uuid()->toString());
        $ts = TSolicitud::find($req->solnro);
        $ts->estado = '0';
        if($ts->save())
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
    public function actSaveEditarSoli(Request $req)
    {
        // dd($req->all());
        $ts = TSolicitud::find($req->solnro);
        $req['fechaActualizacion']=now();
        $ts->fill($req->all());
        if($ts->save())
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
            return response()->json(["msg"=>"Ocurrio un error inesperado.","estado"=>false]);
    }
}
