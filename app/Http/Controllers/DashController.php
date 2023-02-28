<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    //actListarSegunEstado
    public function actListarSegunEstado()
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
            $tsql = "select estado,* from regsoli where estado is not null and estado!=''";
            $stmt = sqlsrv_query($conn_sis, $tsql); 
            $arreglo = array(); 
            $html='';
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
            {
                $arreglo[] = $row;
                // if($row['estado']>='2')
                // {
                //     $banFactibilidad = '<button type="button" class="btn text-success" title="La fecha de Factibilidad ya fue programada"><i class="fa-solid fa-business-time"></i></button>';
                // }
                // else
                // {
                //     $banFactibilidad = '<button type="button" class="btn text-secondary" title="Programar factivilidad" onclick="regFactibilidad('.$row['SolNro'].')"><i class="fa-solid fa-business-time"></i></button>';
                // }
                // $fechaFormat = date("d/m/Y",$row['SolFex']->getTimestamp());
                // $html=$html.'<tr class="text-center">'.
                //     '<td class="font-weight-bold">'.$row['SolNro'].'</td>'.
                //     '<td class="font-weight-bold">'.$row['SolElect'].'</td>'.
                //     '<td>'.$row['SolNombre'].'</td>'.
                //     '<td>'.$row['SolTipCal'].$row['SolDirec'].$row['SolDirNro'].'</td>'.
                //     '<td>'.
                //         '<div class="btn-group btn-group-sm" role="group">'.
                //             $banFactibilidad.
                //             '<button type="button" class="btn text-info" title="Editar archivo" onclick="registrarAdicional('.$row['SolNro'].')"><i class="fa fa-edit" ></i></button>'.
                //             '<a class="btn text-info" title="Descargar documento" onclick="sendData('.$row['SolNro'].')" id="'.$row['SolNro'].'" 
                //             data-solnro="'.$row['SolNro'].'" data-solnombre="'.$row['SolNombre'].'" data-soltipcal="'.$row['SolTipCal'].'" data-soldirec="'.$row['SolDirec'].'" data-soldirnro="'.$row['SolDirNro'].'" data-soldircom="'.$row['SolDirCom'].'" data-solurban="'.$row['SolUrban'].'" data-solelect="'.$row['SolElect'].'" data-solfex="'.$fechaFormat.'" data-soltelef="'.$row['SolTelef'].'"><i class="fa fa-download"></i></a>'.
                //         '</div>'.
                //     '</td>'.
                // '</tr>';
            }
            // echo $html;
            // dd($arreglo);
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
}
