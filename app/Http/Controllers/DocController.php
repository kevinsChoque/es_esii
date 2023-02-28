<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use DB;
use App\Models\TCliente;
use App\Models\TPersona;

class DocController extends Controller
{
    public function actDoc(Request $req)
    {
    	return view('doc.doc');
    }
    public function actListar(Request $req)
    {
        // $serverName = 'localhost';

        // $connectionInfo = array("Database"=>"Amigos","UID"=>"kevins","PWD"=>"@emusap1@","CharacterSet"=>"UTF-8");
        // $conn_sis = sqlsrv_connect($serverName,$connectionInfo);
        // if($conn_sis)
        // {
        //     echo("con exitosa");
        //     echo "<br>";
        //     $tsql = "select * from dbo.cliente";  
        //     $stmt = sqlsrv_query($conn_sis, $tsql);  
        //     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        //         echo $row['nombre'].", ".$row['apellido']."<br />";
        //     }
        // }
        // else
        // {
        //     echo("fallo");
        //     die(print_r(sqlsrv_errors(),true));
        // }
        // exit();
        // -------------------
        // $query = DB::table('dbo.cliente')->get();
        // dd($query);
        // -------------------
    	$sql = "select * from cliente";

        $data=DB::select($sql);

        // return view('doc.doc',['data'=>$data]);

        return response()->json(["data"=>$data]);

    }
    public function actDownload(Request $req)
    {
        
        // dd(NumberFormatter::create('en', NumberFormatter::SPELLOUT)->format(12309));
        // $fmt = new NumberFormatter( 'en', NumberFormatter::SPELLOUT );
        // dd($fmt->format(1142));exit();
    	$firmador = TPersona::where('firma','1')->first();
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $tp = new TemplateProcessor('plantillas/contrato.docx');
        // dd($tp);
        // $tp = new TemplateProcessor('word-template/informe.docx');
        // $tInforme = TInforme::find($idInforme);
        // $dia = $tInforme->fechaRegistro;
        // $fecha = strftime("%d de %B de %Y", strtotime($dia));
        // $anio = strftime("%Y", strtotime($dia));
        // if($tCliente!=null)
        // {
        $tp->setValue('inscrinro',$req->inscrinro);
        $tp->setValue('firmador',$firmador->nombre.' '.$firmador->apellido);
        $tp->setValue('nombre',$req->docNombre);
        $tp->setValue('dni',$req->docDni);
        $tp->setValue('hora',$req->docHora);

        $tp->setValue('caldes',$req->caldes);
        $tp->setValue('caltip',$req->caltip);
        $tp->setValue('prenro',$req->prenro);
        $tp->setValue('nomfircon',$req->nomfircon);
        $tp->setValue('urbdes',$req->urbdes);
        $tp->setValue('urbtip',$req->urbtip);
        // ---------------------------------
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
            // $ppp='00130687';
            // dd($req->inscrinro);
            $tsql = "select * from CREDITOS where InscriNrc='$req->inscrinro'";
            // $tsql = "select * from CREDITOS where InscriNrc='$ppp'";
            $stmt = sqlsrv_query($conn_sis, $tsql); 
            $arreglo = array(); 
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
            {   $arreglo[] = $row;}
            if(count($arreglo)==0)
            {
                $tp->setValue('fp1','X');
                $tp->setValue('fp2','');
                $tp->setValue('nPlazo','');
                $tp->setValue('cuoMen','');
                $tp->setValue('cuotaIni','');
                $tp->setValue('nCuotas','');
                
                $tsql3 = "select *  from INSCRIPC where InscriNro='$req->inscrinro'";
                $stmt3 = sqlsrv_query($conn_sis, $tsql3); 
                $arreglo3 = array(); 
                while( $row3 = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC) ) 
                {   $arreglo3[] = $row3;}

                $tp->setValue('montoTotal',round($arreglo3[0]['CtaColSAn'],2));
                $tp->setValue('interes','');
            }
            else
            {
                $tp->setValue('fp1','');
                $tp->setValue('fp2','X');
                // dd($arreglo[count($arreglo)-1]['CredNro']);//para sacar el ultimo credito
                // dd($arreglo[0]['CredNro']);//para sacar el primer credito
                $numeroCredito = $arreglo[0]['CredNro'];
                
                $tsql2 = "select * from LETRAS where CredNro='$numeroCredito' order by LtNum asc";
                $stmt2 = sqlsrv_query($conn_sis, $tsql2); 
                $arreglo2 = array(); 
                while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
                {   $arreglo2[] = $row2;}
                
                $tp->setValue('montoTotal',number_format($arreglo2[0]['LtSaldo'],2,',',''));
                $tp->setValue('nPlazo',count($arreglo2)-1);
                $tp->setValue('cuoMen',number_format($arreglo2[1]['LtCuota'],2,',',''));
                $tp->setValue('cuotaIni',number_format($arreglo2[0]['LtCuota'],2,',',''));
                $tp->setValue('nCuotas',count($arreglo2));

                $tsql4 = "select top 1 * from  TASASIN order by AnoFac desc";
                $stmt4 = sqlsrv_query($conn_sis, $tsql4); 
                $arreglo4 = array(); 
                while( $row4 = sqlsrv_fetch_array( $stmt4, SQLSRV_FETCH_ASSOC) ) 
                {   $arreglo4[] = $row4;}
                $tp->setValue('interes',number_format($arreglo4[0]['TasaInt'],2,',','').'%');
                
            }
            // --------------------------
        }
        // ***seteamos la forma de pago
        
        // dd($arreglo[0]['OfiCod']);
        // ---------------------------------
        $fileName='contrato.docx';
        $tp->saveAs($fileName);
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
