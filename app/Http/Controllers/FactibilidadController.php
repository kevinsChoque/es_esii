<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use App\Models\TFactibilidad;
use App\Models\TDatafac;
use App\Models\THistorialfac;
use App\Models\TSolicitud;
use App\Models\TNumero;
use App\Models\TMedicion;


class FactibilidadController extends Controller
{
    public function actFactibilidad(Request $req)
    {
    	return view('factibilidad.factibilidad');
    }
    public function actListar()
    {
        // $registros = TFactibilidad::select('factibilidad.*','solicitud.*','persona.*','data_fac.*')
        //     ->leftjoin('solicitud','solicitud.solnro','=','factibilidad.solnro')
        //     ->join('persona','persona.idPersona','=','factibilidad.idPersona')
        //     ->leftjoin('data_fac','data_fac.solnrof','=','factibilidad.solnro')
        //     ->where('factibilidad.estado','=','1')
        //     ->orderBy('factibilidad.idFac', 'DESC')
        //     ->get();
        $registros = TFactibilidad::select('factibilidad.*','solicitud.*','persona.*','historial_fac.*')
            ->leftjoin('solicitud','solicitud.solnro','=','factibilidad.solnro')
            ->leftjoin('historial_fac','historial_fac.idFac','=','factibilidad.idFac')
            ->join('persona','persona.idPersona','=','historial_fac.idPersona')
            ->where('historial_fac.estado','=','1')
            ->where('factibilidad.estado','!=','0')
            ->where('solicitud.estadoProceso','=','2')
            ->orderBy('factibilidad.idFac', 'DESC')
            ->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
    public function actShowLastFactibilidad(Request $req)
    {
        // dd($req->all());
        // $tf = TFactibilidad::where('solnro',$req->solnro)->orderBy('idFac','desc')->first();
        $tf = THistorialfac::select('historial_fac.*')
            ->leftjoin('factibilidad','factibilidad.idFac','=','historial_fac.idFac')
            ->where('factibilidad.solnro','=',$req->solnro)
            ->where('historial_fac.estado','=','1')
            ->first();
        // dd($tf);
        if($tf!=null)
            return response()->json(["data"=>$tf,"estado"=>true]);
        else
            return response()->json(["data"=>"","estado"=>false]);
    }
    public function actSaveFacRep(Request $req)
    {
        // $tfOld = TFactibilidad::where('solnro',$req->solnro)->orderBy('idFac','desc')->first();
        $tfOld = THistorialfac::select('historial_fac.*')
            ->leftjoin('factibilidad','factibilidad.idFac','=','historial_fac.idFac')
            ->where('factibilidad.solnro','=',$req->solnro)
            ->where('historial_fac.estado','=','1')
            ->first();
        $tfOld->estado = '0';
        if($tfOld->save())
        {
            $req['estado'] = 1;
            $req['idFac'] = $tfOld->idFac;
            $th=THistorialfac::create($req->all());
            if($th!=null)
            {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
            else
            {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
        }
    }
    public function actListarHistorial(Request $req)
    {
        // $registros = TFactibilidad::select('factibilidad.*','solicitud.*','persona.*')
        //     ->leftjoin('solicitud','solicitud.solnro','=','factibilidad.solnro')
        //     ->join('persona','persona.idPersona','=','factibilidad.idPersona')
        //     ->where('factibilidad.solnro','=',$req->solnro)
        //     ->orderBy('factibilidad.idFac', 'DESC')
        //     ->get();

        $registros = THistorialfac::select('factibilidad.*','persona.*','historial_fac.*')
            ->leftjoin('factibilidad','factibilidad.idFac','=','historial_fac.idFac')
            ->join('persona','persona.idPersona','=','historial_fac.idPersona')
            ->where('factibilidad.solnro','=',$req->solnro)
            ->orderBy('historial_fac.idHf', 'DESC')
            ->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
    public function actSaveDataFac(Request $req)
    {
        // dd('llego aki--');
        $tf = TFactibilidad::where('solnro',$req->solnro)->first();
        $ban=false;
        if($tf==null)
        {
            $tf = TDatafac::create($req->all());
            $ban = true;
        }
        else
        {
            $tf->fill($req->all());
            if($tf->save())
            {   
                if($tf->resultado=='1')
                {
                    $ts = TSolicitud::where('solnro',$req->solnro)->first();
                    $ts->estadoProceso='3';

                    $tm = TMedicion::where('solnro',$req->solnro)->first();
                    if($tm==null)
                    {
                        $tm = new TMedicion();
                        $tm->solnro = $req->solnro;
                        $tm->estadoEli = '1';
                        $tm->estado = '0';
                    }
                    else
                    {
                        $tm->estadoEli='1';
                    }
                    if($ts->save() && $tm->save())
                    {
                        $ban = true;
                        return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
                    }
                }
                return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
            }
            else
            {   
                $ban = false;
                return response()->json(["msg"=>"Ocurrio un error almomento de actualizar datos.","estado"=>false]);
            }
        }

        // if($tf->resultado=='1' && $ban==true)
        // {
        //     $serverName = 'informatica2-pc\sicem_bd';
        //     $connectionInfo = array(
        //         "Database"=>"SICEM_AB",
        //         "UID"=>"es_esi",
        //         "PWD"=>"@emusap1@",
        //         "CharacterSet"=>"UTF-8"
        //     );
        //     $conn_sis = sqlsrv_connect($serverName,$connectionInfo);
        //     if($conn_sis)
        //     {
        //         $sql = "EXECUTE testEsi '$req->solnro', '3';";
        //         if($stmt = sqlsrv_query($conn_sis, $sql))
        //         {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        //         else
        //         {   return response()->json(["msg"=>"Paso algo al momento de ejecutar procedimiento.","estado"=>true]);}
        //     }
        //     else
        //     {   return response()->json(["msg"=>"Error en la conexion a la BD principal.","estado"=>true]);}
        // }
        // if($ban)
        // {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
    }
    public function actShow(Request $req)
    {
        $td = TFactibilidad::where('solnro',$req->solnro)->first();
        if($td!=null)
            return response()->json(["data"=>$td,"estado"=>true]);
        else
            return response()->json(["data"=>"","estado"=>false]);
    }
    public function actGuardarSegunSeaCaso(Request $req)
    {
        // buscamos existencia de solicitud
        $ts = TSolicitud::where('solnro',$req->solnro)->first();

        if($ts==null)
        {
            // creamos solicitud
            $tn = TNumero::where('documento','Solicitud')->first();
            if($tn->estado!=0)
            {
                if($tn->numeroActual!=0)
                {
                    $tn->numeroActual=(int)$tn->numeroActual+1;
                    $req['numSoli']='2023-'.((int)$tn->numeroActual+1);
                }
                else
                {
                    $tn->numeroActual=(int)$tn->numero+1;
                    $req['numSoli']='2023-'.((int)$tn->numero+1);
                }
            }
            $req['fechaRegistro']=now();
            $ts=TSolicitud::create($req->all());
            $tn->save();
        }

        // primero creamos factibilidad 
        $tf = new TFactibilidad();
        $tf->solnro = $req->solnro;

        if($tf->save())
        {
            $tf = TFactibilidad::where('solnro',$req->solnro)->first();

            $th = new THistorialfac();
            $th->idFac = $tf->idFac;
            $th->idPersona = $req->idPersona;
            $th->fecha = $req->fecha;
            $th->estado = 1;

            if($th->save())
            {   
                // return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
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
            {   return response()->json(["msg"=>"No se guardo fecha de factibilidad correctamente.","estado"=>true]);}
        }
        else
        {   return response()->json(["msg"=>"No se pudo registrar factibilidad.","estado"=>true]);}
        
        // de ahi guardamos historial
    }
    public function actDownload(Request $req,$solnro=null)
    {
        // $tf = TFactibilidad::where('solnro',$solnro)->first();
        $tf = TFactibilidad::select('factibilidad.*','solicitud.*')
            ->join('solicitud','solicitud.solnro','=','factibilidad.solnro')
            ->where('factibilidad.solnro','=',$solnro)
            ->first();

        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $tp = new TemplateProcessor('plantillas/factibilidad.docx');
        // ----------------------
        $tp->setValue('codigo',$tf->codigo=='' || $tf->codigo==null?'':$tf->codigo);
        $tp->setValue('nombre',$tf->nombreTit=='' || $tf->nombreTit==null?'':$tf->nombreTit);
        $tp->setValue('dni',$tf->dniTit=='' || $tf->dniTit==null?'':$tf->dniTit);
        $tp->setValue('direccion',$tf->domicilioTit=='' || $tf->domicilioTit==null?'':$tf->domicilioTit);
        $tp->setValue('urb',$tf->urbanizacionTit=='' || $tf->urbanizacionTit==null?'':$tf->urbanizacionTit);
        $tp->setValue('cel','');
        $tp->setValue('correo',$tf->correoTit=='' || $tf->correoTit==null?'':$tf->correoTit);
        $tp->setValue('responsable','propietario');
        $tp->setValue('inscripcion','');

        $tp->setValue('q',$tf->tipoPropiedad=='Particular o terreno independiente'?'X':'');
        $tp->setValue('w',$tf->tipoPropiedad=='Publico o terreno del estado'?'X':'');

        $tp->setValue('o1',$tf->tipoConstruccion=='Vivienda'?'X':'');
        $tp->setValue('o2',$tf->tipoConstruccion=='Lote baldio'?'X':'');
        $tp->setValue('o3',$tf->tipoConstruccion=='Edificio (3 pisos a mas)'?'X':'');
        $tp->setValue('o4',$tf->tipoConstruccion=='Lote cercado'?'X':'');
        $tp->setValue('o5',$tf->tipoConstruccion=='Edificio estatal'?'X':'');
        $tp->setValue('o6',$tf->tipoConstruccion=='Otros'?'X':'');
        $tp->setValue('otros',$tf->otros=='' || $tf->otros==null?'':$tf->otros);
        $tp->setValue('material',$tf->material=='' || $tf->material==null?'':$tf->material);
        $tp->setValue('numPisos',$tf->numPisos=='' || $tf->numPisos==null?'':$tf->numPisos);
        $tp->setValue('numFamilias',$tf->numFamilias=='' || $tf->numFamilias==null?'':$tf->numFamilias);
        $tp->setValue('numHabitantes',$tf->numHabitantes=='' || $tf->numHabitantes==null?'':$tf->numHabitantes);

        $tp->setValue('act',$tf->act=='' || $tf->act==null?'':$tf->act);
        $tp->setValue('a1',$tf->tarifa=='Social'?'X':'');
        $tp->setValue('a2',$tf->tarifa=='Comercial'?'X':'');
        $tp->setValue('a3',$tf->tarifa=='Estatal'?'X':'');
        $tp->setValue('a4',$tf->tarifa=='Domestico'?'X':'');
        $tp->setValue('a5',$tf->tarifa=='Industrial'?'X':'');
        $tp->setValue('unidad',$tf->unidad=='' || $tf->unidad==null?'':$tf->unidad);

        $tp->setValue('e1',$tf->servicio=='Agua y desague'?'X':'');
        $tp->setValue('e2',$tf->servicio=='Solo agua'?'X':'');
        $tp->setValue('e3',$tf->servicio=='Solo desague'?'X':'');

        $tp->setValue('i1',$tf->formaPago=='Pago hobligatorio del 100%'?'X':'');
        $tp->setValue('i2',$tf->formaPago=='Apto al pago fraccionado'?'X':'');
        $tp->setValue('motivo',$tf->motivo=='' || $tf->motivo==null?'':$tf->motivo);

        $tp->setValue('u1',$tf->cuentaAlcantarillado=='1'?'X':'');
        $tp->setValue('u2',$tf->cuentaAlcantarillado=='' || $tf->cuentaAlcantarillado==null || $tf->cuentaAlcantarillado=='0'?'X':'');

        $tp->setValue('ud1',$tf->cuentaAlcantarillado=='1'?$tf->dCuentaAlcantarillado:'');
        $tp->setValue('ud2',$tf->cuentaAlcantarillado=='' || $tf->cuentaAlcantarillado==null || $tf->cuentaAlcantarillado=='0'?$tf->dCuentaAlcantarillado:'');

        $tp->setValue('c1',$tf->cuenta=='Tanque alto y bajo'?'X':'');
        $tp->setValue('c2',$tf->cuenta=='Solo tanque alto'?'X':'');
        $tp->setValue('c3',$tf->cuenta=='Solo tanque bajo'?'X':'');
        $tp->setValue('c4',$tf->cuenta=='No cuenta'?'X':'');

        $tp->setValue('p1',$tf->periodicidad=='Mensual'?'X':'');
        $tp->setValue('p2',$tf->periodicidad=='Otros'?'X':'');
        $tp->setValue('otros1',$tf->otros1=='' || $tf->otros1==null?'':$tf->otros1);

        $tp->setValue('cp1',$tf->cuentaPunto=='Si cuenta'?'X':'');
        $tp->setValue('cp2',$tf->cuentaPunto=='No cuenta con punto de agua'?'X':'');

        $tp->setValue('r1',$tf->resultado=='1'?'X':'');
        $tp->setValue('r2',$tf->resultado=='0'?'X':'');
        $tp->setValue('motivo1',$tf->motivo1=='' || $tf->motivo1==null?'':$tf->motivo1);
        $tp->setValue('obs',$tf->obs=='' || $tf->obs==null?'':$tf->obs);

        $tp->setValue('am1',$tf->atendido=='Presencial'?'X':'');
        $tp->setValue('am2',$tf->atendido=='Mediante telefono'?'X':'');


        $fileName='factibilidad.docx';
        $tp->saveAs($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);

        dd('llego');
    }
    public function actGeFacSol(Request $req)
    {
        // dd($req->all());
        $tfb = TFactibilidad::where('solnro',$req->solnro)->first();
        if($tfb==null)
        {
            $tf = new TFactibilidad();
            $tf->solnro = $req->solnro;
            $tf->estado = '1';

            if($tf->save())
            {
                $tf = TFactibilidad::where('solnro',$req->solnro)->first();

                $th = new THistorialfac();
                $th->idFac = $tf->idFac;
                $th->idPersona = $req->idPersona;
                $th->fecha = $req->fecha;
                $th->estado = 1;

                if($th->save())
                {   
                    $ts = TSolicitud::where('solnro',$req->solnro)->first();
                    $ts->estadoProceso = '2';
                    if($ts->save())
                    {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
                    else
                    {   return response()->json(["msg"=>"Error al actualizar estado de Solicitud.","estado"=>false]);}
                }
                else
                {   return response()->json(["msg"=>"No se guardo fecha de factibilidad correctamente.","estado"=>true]);}
            }
            else
            {   return response()->json(["msg"=>"No se pudo registrar factibilidad.","estado"=>true]);}
        }
        else
        {
            $tfb->estado = '1';
            $ts = TSolicitud::where('solnro',$req->solnro)->first();
            $ts->estadoProceso = '2';
            if($tfb->save() && $ts->save())
            {
                $tfOld = THistorialfac::select('historial_fac.*')
                    ->leftjoin('factibilidad','factibilidad.idFac','=','historial_fac.idFac')
                    ->where('factibilidad.solnro','=',$req->solnro)
                    ->where('historial_fac.estado','=','1')
                    ->first();
                $tfOld->estado = '0';
                if($tfOld->save())
                {
                    $th = new THistorialfac();
                    $th->idFac = $tfOld->idFac;
                    $th->idPersona = $req->idPersona;
                    $th->fecha = $req->fecha;
                    $th->estado = 1;
                    if($th->save())
                    {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
                    else
                    {   return response()->json(["msg"=>"Ocurrio un problema.","estado"=>false]);}
                }
            }
        }

        
    }
    public function actEliminar(Request $req)
    {
        // dd(Str::uuid()->toString());
        $tf = TFactibilidad::where('solnro',$req->solnro)->first();
        $tf->estado = '0';
        if($tf->save())
        {
            $ts = TSolicitud::where('solnro',$req->solnro)->first();
            $ts->estadoProceso = '1';
            if($ts->save())
            {
                return response()->json(["msg"=>"Operacion exitosa, se revirtio el estado del registro a SOLICITUD.","estado"=>true]);
            }
            return response()->json(["msg"=>"No fue posible revertir el estado del registro a SOLICITUD.","estado"=>false]);
        }
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
}
