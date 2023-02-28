<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use App\Models\TFactibilidad;
use App\Models\THistorialfac;
use App\Models\TDatafac;
use App\Models\TMedicion;
use App\Models\TDatamed;
use App\Models\TSolicitud;


class MedicionController extends Controller
{
    public function actMedicion(Request $req)
    {
    	return view('medicion.medicion');
    }
    public function actListar()
    {
        // $registros = TFactibilidad::select('factibilidad.*','solicitud.*','historial_fac.*','persona.*','medicion.idMed')
        //     ->leftjoin('solicitud','solicitud.solnro','=','factibilidad.solnro')
        //     ->leftjoin('historial_fac','historial_fac.idFac','=','factibilidad.idFac')
        //     ->leftjoin('medicion','medicion.solnro','=','factibilidad.solnro')
        //     ->leftjoin('persona','persona.idPersona','=','historial_fac.idPersona')
        //     // ->leftjoin('data_med','data_med.solnromedicion','=','data_fac.solnrof')
        //     ->where('medicion.estado','=','0')
        //     ->orWhereNull('medicion.estado')
        //     ->where('factibilidad.resultado','=','1')
        //     ->where('historial_fac.estado','=','1')
        //     ->where('medicion.estadoEli','=','1')
        //     // ->where('data_med.estado','=','1')
        //     ->orderBy('factibilidad.idFac', 'DESC')
        //     // ->groupby('factibilidad.idFac')
        //     ->get();

        $registros = TSolicitud::select('solicitud.*','historial_fac.*','persona.*','medicion.idMed')
            ->leftjoin('factibilidad','factibilidad.solnro','=','solicitud.solnro')
            ->leftjoin('historial_fac','historial_fac.idFac','=','factibilidad.idFac')
            ->leftjoin('persona','persona.idPersona','=','historial_fac.idPersona')
            ->leftjoin('medicion','medicion.solnro','=','factibilidad.solnro')
            ->where('solicitud.estadoProceso','=','3')
            ->where('historial_fac.estado','=','1')
            ->orderBy('factibilidad.idFac', 'DESC')
            ->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
    // actSaveMedicion
    public function actSaveProMed(Request $req)
    {
        // dd($req->all());
        $tm = TMedicion::where('solnro',$req->solnro)->first();
        if($tm==null)
        {
            // creamos medicion
            $tm=TMedicion::create($req->all());
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        }
        else
        {
            $tm->idPersona = $req->idPersona;
            $tm->fecha = $req->fecha;
            if($tm->save())
            {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
            else
            {   return response()->json(["msg"=>"Ocurrio un error.","estado"=>false]);}
        }
        // if($tm==null)
        // {
        // 	$req['estado'] = 1;
        // 	$tm=TMedicion::create($req->all());
        //     if($tm!=null)
        //     {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        //     else
        //     {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
        // }
        // else
        // {
        // 	$tmOld = TMedicion::where('solnrom',$req->solnrom)->orderBy('idMedicion','desc')->first();
        // 	$tmOld->estado = '0';
        // 	if($tmOld->save())
        // 	{
        // 		$req['estado'] = 1;
	       //  	$tm=TMedicion::create($req->all());
	       //      if($tm!=null)
	       //      {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
	       //      else
	       //      {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
        // 	}
        // }
    }
    public function actShowLastMedicion(Request $req)
    {
        // dd($req->all());
        $tm = TMedicion::where('solnrom',$req->solnro)->orderBy('idMedicion','desc')->first();
        // dd($tm);
        if($tm!=null)
            return response()->json(["data"=>$tm,"estado"=>true]);
        else
            return response()->json(["data"=>"","estado"=>false]);
    }
    public function actSaveDataMed(Request $req)
    {
        // dd($req->all());
        $tm = TMedicion::where('solnro',$req->solnro)->first();
        $ban=false;
        if($tm==null)
        {
            $tm = TMedicion::create($req->all());
            $ban = true;
            // return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        }
        else
        {
            $tm->fill($req->all());
            if($tm->save())
            {   
                if($tm->estado=='1')
                {
                    $ts = TSolicitud::where('solnro',$req->solnro)->first();
                    // dd($req->solnro);
                    $ts->estadoProceso='4';
                    if($ts->save())
                    {
                        $ban = true;
                        return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
                    }
                }
                $ban = true;
                return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
            }
            else
            {   $ban = false;}
        }
        if($tm->estado=='1' && $ban==true)
        {
            // dd('llegohasta aki');
            $serverName = 'informatica2-pc\sicem_bd';
            $connectionInfo = array(
                "Database"=>"SICEM_AB",
                "UID"=>"es_esi",
                "PWD"=>"@emusap1@",
                "CharacterSet"=>"UTF-8"
            );
            $conn_sis = sqlsrv_connect($serverName,$connectionInfo);
            if($conn_sis)
            {
                // dd('entro');
                $sql = "EXECUTE testEsi '$req->solnro', '4';";
                if($stmt = sqlsrv_query($conn_sis, $sql))
                {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
                else
                {   return response()->json(["msg"=>"Paso algo al momento de ejecutar procedimiento.","estado"=>true]);}
            }
            else
            {   return response()->json(["msg"=>"Error en la conexion a la BD principal.","estado"=>true]);}
        }
        if($ban)
        {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
    }
    public function actShow(Request $req)
    {
        $tm = TMedicion::where('solnro',$req->solnro)->first();
        if($tm!=null)
            return response()->json(["data"=>$tm,"estado"=>true]);
        else
            return response()->json(["data"=>"","estado"=>false]);
    }
    public function actDownload(Request $req,$solnro=null)
    {
        // dd($solnro);
        // $tf = TFactibilidad::where('solnro',$solnro)->first();
        $tm = TMedicion::where('solnro','=',$solnro)->first();

        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $tp = new TemplateProcessor('plantillas/medicion.docx');
        // ----------------------
        $tp->setValue('dta1',$tm->diametroTuberiaA=='1/2 pulgada'?'X':'');
        $tp->setValue('dta2',$tm->diametroTuberiaA=='1(*) pulgada'?'X':'');
        $tp->setValue('dta3',$tm->diametroTuberiaA=='3/4(*) pulgada'?'X':'');
        $tp->setValue('dta4',$tm->diametroTuberiaA=='Otros'?'X':'');
        $tp->setValue('otros1',$tm->otros1=='' || $tm->otros1==null?'':$tm->otros1);

        $tp->setValue('lona',$tm->longuitudAgua=='' || $tm->longuitudAgua==null?'':$tm->longuitudAgua);
        $tp->setValue('diaa',$tm->diametroAgua=='' || $tm->diametroAgua==null?'':$tm->diametroAgua);

        $tp->setValue('cat',$tm->cat=='1'?'X':'');
        $tp->setValue('cap',$tm->cap=='1'?'X':'');
        $tp->setValue('cav',$tm->cav=='1'?'X':'');
        $tp->setValue('cae',$tm->cae=='1'?'X':'');
        $tp->setValue('cao',$tm->cao=='1'?'X':'');
        $tp->setValue('dat',$tm->dat=='' || $tm->dat==null?'':$tm->dat);
        $tp->setValue('dap',$tm->dap=='' || $tm->dap==null?'':$tm->dap);
        $tp->setValue('dav',$tm->dav=='' || $tm->dav==null?'':$tm->dav);
        $tp->setValue('dae',$tm->dae=='' || $tm->dae==null?'':$tm->dae);
        $tp->setValue('dao',$tm->dao=='' || $tm->dao==null?'':$tm->dao);
        $tp->setValue('ddat',$tm->ddat=='' || $tm->ddat==null?'':$tm->ddat);
        $tp->setValue('ddap',$tm->ddap=='' || $tm->ddap==null?'':$tm->ddap);
        $tp->setValue('ddav',$tm->ddav=='' || $tm->ddav==null?'':$tm->ddav);
        $tp->setValue('ddae',$tm->ddae=='' || $tm->ddae==null?'':$tm->ddae);
        $tp->setValue('ddao',$tm->ddao=='' || $tm->ddao==null?'':$tm->ddao);
        $tp->setValue('tipoPredio',$tm->tipoPredio=='' || $tm->tipoPredio==null?'':$tm->tipoPredio);
        $tp->setValue('obs1',$tm->obs1=='' || $tm->obs1==null?'':$tm->obs1);

        $tp->setValue('dtd1',$tm->diametroTuberiaD=='4 pulgada'?'X':'');
        $tp->setValue('dtd2',$tm->diametroTuberiaD=='6 pulgada'?'X':'');
        $tp->setValue('dtd3',$tm->diametroTuberiaD=='Otros'?'X':'');
        $tp->setValue('otros2',$tm->otros2=='' || $tm->otros2==null?'':$tm->otros2);

        $tp->setValue('lond',$tm->longuitudDesague=='' || $tm->longuitudDesague==null?'':$tm->longuitudDesague);
        $tp->setValue('diad',$tm->diametroDesague=='' || $tm->diametroDesague==null?'':$tm->diametroDesague);
        $tp->setValue('profundidad',$tm->profundidad=='' || $tm->profundidad==null?'':$tm->profundidad);

        $tp->setValue('cdt',$tm->cdt=='1'?'X':'');
        $tp->setValue('cdp',$tm->cdp=='1'?'X':'');
        $tp->setValue('cdv',$tm->cdv=='1'?'X':'');
        $tp->setValue('cde',$tm->cde=='1'?'X':'');
        $tp->setValue('cdo',$tm->cdo=='1'?'X':'');
        $tp->setValue('ddt',$tm->ddt=='' || $tm->ddt==null?'':$tm->ddt);
        $tp->setValue('ddp',$tm->ddp=='' || $tm->ddp==null?'':$tm->ddp);
        $tp->setValue('ddv',$tm->ddv=='' || $tm->ddv==null?'':$tm->ddv);
        $tp->setValue('dde',$tm->dde=='' || $tm->dde==null?'':$tm->dde);
        $tp->setValue('ddo',$tm->ddo=='' || $tm->ddo==null?'':$tm->ddo);
        $tp->setValue('dddt',$tm->dddt=='' || $tm->dddt==null?'':$tm->dddt);
        $tp->setValue('dddp',$tm->dddp=='' || $tm->dddp==null?'':$tm->dddp);
        $tp->setValue('dddv',$tm->dddv=='' || $tm->dddv==null?'':$tm->dddv);
        $tp->setValue('ddde',$tm->ddde=='' || $tm->ddde==null?'':$tm->ddde);
        $tp->setValue('dddo',$tm->dddo=='' || $tm->dddo==null?'':$tm->dddo);
        $tp->setValue('calidadAgua',$tm->calidadAgua=='' || $tm->calidadAgua==null?'':$tm->calidadAgua);
        $tp->setValue('obs2',$tm->obs2=='' || $tm->obs2==null?'':$tm->obs2);
        // $tp->setValue('codigo',$tf->codigo=='' || $tf->codigo==null?'':$tf->codigo);
        // $tp->setValue('nombre',$tf->nombreTit=='' || $tf->nombreTit==null?'':$tf->nombreTit);
        // $tp->setValue('dni',$tf->dniTit=='' || $tf->dniTit==null?'':$tf->dniTit);
        // $tp->setValue('direccion',$tf->domicilioTit=='' || $tf->domicilioTit==null?'':$tf->domicilioTit);
        // $tp->setValue('urb',$tf->urbanizacionTit=='' || $tf->urbanizacionTit==null?'':$tf->urbanizacionTit);
        // $tp->setValue('cel','');
        // $tp->setValue('correo',$tf->correoTit=='' || $tf->correoTit==null?'':$tf->correoTit);
        // $tp->setValue('responsable','propietario');
        // $tp->setValue('inscripcion','');

        // $tp->setValue('q',$tf->tipoPropiedad=='Particular o terreno independiente'?'X':'');
        // $tp->setValue('w',$tf->tipoPropiedad=='Publico o terreno del estado'?'X':'');

        // $tp->setValue('o1',$tf->tipoConstruccion=='Vivienda'?'X':'');
        // $tp->setValue('o2',$tf->tipoConstruccion=='Lote baldio'?'X':'');
        // $tp->setValue('o3',$tf->tipoConstruccion=='Edificio (3 pisos a mas)'?'X':'');
        // $tp->setValue('o4',$tf->tipoConstruccion=='Lote cercado'?'X':'');
        // $tp->setValue('o5',$tf->tipoConstruccion=='Edificio estatal'?'X':'');
        // $tp->setValue('o6',$tf->tipoConstruccion=='Otros'?'X':'');
        // $tp->setValue('otros',$tf->otros=='' || $tf->otros==null?'':$tf->otros);
        // $tp->setValue('material',$tf->material=='' || $tf->material==null?'':$tf->material);
        // $tp->setValue('numPisos',$tf->numPisos=='' || $tf->numPisos==null?'':$tf->numPisos);
        // $tp->setValue('numFamilias',$tf->numFamilias=='' || $tf->numFamilias==null?'':$tf->numFamilias);
        // $tp->setValue('numHabitantes',$tf->numHabitantes=='' || $tf->numHabitantes==null?'':$tf->numHabitantes);

        // $tp->setValue('act',$tf->act=='' || $tf->act==null?'':$tf->act);
        // $tp->setValue('a1',$tf->tarifa=='Social'?'X':'');
        // $tp->setValue('a2',$tf->tarifa=='Comercial'?'X':'');
        // $tp->setValue('a3',$tf->tarifa=='Estatal'?'X':'');
        // $tp->setValue('a4',$tf->tarifa=='Domestico'?'X':'');
        // $tp->setValue('a5',$tf->tarifa=='Industrial'?'X':'');
        // $tp->setValue('unidad',$tf->unidad=='' || $tf->unidad==null?'':$tf->unidad);

        // $tp->setValue('e1',$tf->servicio=='Agua y desague'?'X':'');
        // $tp->setValue('e2',$tf->servicio=='Solo agua'?'X':'');
        // $tp->setValue('e3',$tf->servicio=='Solo desague'?'X':'');

        // $tp->setValue('i1',$tf->formaPago=='Pago hobligatorio del 100%'?'X':'');
        // $tp->setValue('i2',$tf->formaPago=='Apto al pago fraccionado'?'X':'');
        // $tp->setValue('motivo',$tf->motivo=='' || $tf->motivo==null?'':$tf->motivo);

        // $tp->setValue('u1',$tf->cuentaAlcantarillado=='1'?'X':'');
        // $tp->setValue('u2',$tf->cuentaAlcantarillado=='' || $tf->cuentaAlcantarillado==null || $tf->cuentaAlcantarillado=='0'?'X':'');

        // $tp->setValue('ud1',$tf->cuentaAlcantarillado=='1'?$tf->dCuentaAlcantarillado:'');
        // $tp->setValue('ud2',$tf->cuentaAlcantarillado=='' || $tf->cuentaAlcantarillado==null || $tf->cuentaAlcantarillado=='0'?$tf->dCuentaAlcantarillado:'');

        // $tp->setValue('c1',$tf->cuenta=='Tanque alto y bajo'?'X':'');
        // $tp->setValue('c2',$tf->cuenta=='Solo tanque alto'?'X':'');
        // $tp->setValue('c3',$tf->cuenta=='Solo tanque bajo'?'X':'');
        // $tp->setValue('c4',$tf->cuenta=='No cuenta'?'X':'');

        // $tp->setValue('p1',$tf->periodicidad=='Mensual'?'X':'');
        // $tp->setValue('p2',$tf->periodicidad=='Otros'?'X':'');
        // $tp->setValue('otros1',$tf->otros1=='' || $tf->otros1==null?'':$tf->otros1);

        // $tp->setValue('cp1',$tf->cuentaPunto=='Si cuenta'?'X':'');
        // $tp->setValue('cp2',$tf->cuentaPunto=='No cuenta con punto de agua'?'X':'');

        // $tp->setValue('r1',$tf->resultado=='1'?'X':'');
        // $tp->setValue('r2',$tf->resultado=='0'?'X':'');
        // $tp->setValue('motivo1',$tf->motivo1=='' || $tf->motivo1==null?'':$tf->motivo1);
        // $tp->setValue('obs',$tf->obs=='' || $tf->obs==null?'':$tf->obs);

        // $tp->setValue('am1',$tf->atendido=='Presencial'?'X':'');
        // $tp->setValue('am2',$tf->atendido=='Mediante telefono'?'X':'');


        $fileName='medicion.docx';
        $tp->saveAs($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
    public function actEliminar(Request $req)
    {
        // dd(Str::uuid()->toString());
        $tm = TMedicion::where('solnro',$req->solnro)->first();
        $tm->estadoEli = '0';
        if($tm->save())
        {
            $ts = TSolicitud::where('solnro',$req->solnro)->first();
            $ts->estadoProceso = '2';
            $tf = TFactibilidad::where('solnro',$req->solnro)->first();
            $tf->resultado = '0';
            if($ts->save() && $tf->save())
            {
                return response()->json(["msg"=>"Operacion exitosa, se revirtio el estado del registro a FACTIBILIDAD.","estado"=>true]);
            }
            return response()->json(["msg"=>"No fue posible revertir el estado del registro a FACTIBILIDAD.","estado"=>false]);
            // return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        }
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
}
