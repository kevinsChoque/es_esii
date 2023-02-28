<?php
// $serverName = 'localhost';
$serverName = 'informatica2-pc\sicem_bd';

// $connectionInfo = array("Database"=>"Amigos","UID"=>"kevins","PWD"=>"@emusap1@","CharacterSet"=>"UTF-8");
$connectionInfo = array("Database"=>"SICEM_AB","UID"=>"comercial","PWD"=>"1","CharacterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName,$connectionInfo);

if($conn_sis)
{
	// echo("con exitosa");
	// echo "<br>";

	// $tsql = "select top 10 * from regsoli r where r.SolNro!=0 or r.SolNro=112694 order by r.SolNro desc";
	// $tsql = "select top 10 * from regsoli r where r.SolNro in ('112694','109825','105408') order by r.SolNro desc";
	$tsql = "select * from regsoli r
			where r.SolFec=CONVERT(varchar,GETDATE(),5) and r.SerCod='1005' or SolNro in ('109825','112694','113756')";
	// $tsql = "select * from regsoli r
	// 		where r.SolNro='113866' or r.SolNro='113888'";
			
	$stmt = sqlsrv_query($conn_sis, $tsql); 
	$arreglo = array(); 
	$html='';
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	    // echo $row['Clinomx'].", ".$row['Clilelx']."<br />";
	    $arreglo[] = $row;
	    // echo(json_encode(gettype($row['SolFex'])));exit();
	    // echo(date("d/m/Y",$row['SolFex']->getTimestamp()));exit();
	    if($row['estado']>='2')
	    {
	    	$banFactibilidad = '<button type="button" class="btn text-success" title="La fecha de Factibilidad ya fue programada"><i class="fa-solid fa-business-time"></i></button>';
	    }
	    else
	    {
	    	$banFactibilidad = '<button type="button" class="btn text-secondary" title="Programar factivilidad" onclick="regFactibilidad('.$row['SolNro'].')" style="display:none;"><i class="fa-solid fa-business-time"></i></button>';
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
                	'<button type="button" class="btn text-info" title="Registrar Solicitud" onclick="registrarAdicional('.$row['SolNro'].')"><i class="fa fa-plus" ></i></button>'.
                    '<a class="btn text-info" title="Descargar documento" style="display:none;" onclick="sendData('.$row['SolNro'].')" id="'.$row['SolNro'].'" 
                    data-solnro="'.$row['SolNro'].'" data-solnombre="'.$row['SolNombre'].'" data-soltipcal="'.$row['SolTipCal'].'" data-soldirec="'.$row['SolDirec'].'" data-soldirnro="'.$row['SolDirNro'].'" data-soldircom="'.$row['SolDirCom'].'" data-solurban="'.$row['SolUrban'].'" data-solelect="'.$row['SolElect'].'" data-solfex="'.$fechaFormat.'" data-soltelef="'.$row['SolTelef'].'"><i class="fa fa-download"></i></a>'.
                '</div>'.
            '</td>'.
        '</tr>';
	}
	// echo $arreglo[0]['Clinomx'];
	echo $html;
	// echo json_decode($arreglo);
}
else
{
	echo("fallo");
	die(print_r(sqlsrv_errors(),true));
}