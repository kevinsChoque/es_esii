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
	// $tsql = "select top 10 * from CONEXION";  
	$tsql = "select co.*, rz.CalDes, rz.CalTip, rl.UrbDes, rl.UrbTip  from CONEXION co inner join RZCALLE rz on co.PreCalle=rz.CalCod inner join RLURBA rl on co.PreUrba=rl.UrbCod where co.Confiax=CONVERT(varchar,GETDATE(),5) or InscriNro=000179139 or InscriNro=00130687";
// 	$tsql = "select co.*, rz.CalDes, rz.CalTip, rl.UrbDes, rl.UrbTip  
// 	from CONEXION co 
// 	inner join RZCALLE rz on co.PreCalle=rz.CalCod 
// 	inner join RLURBA rl on co.PreUrba=rl.UrbCod 
// where co.Clilelx in ('31041142','31022852','46269224')";
	$stmt = sqlsrv_query($conn_sis, $tsql); 
	$arreglo = array(); 
	$html='';
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	    // echo $row['Clinomx'].", ".$row['Clilelx']."<br />";
	    $arreglo[] = $row;
	    $html=$html.'<tr class="text-center">'.
	    	'<td class="font-weight-bold">'.$row['InscriNro'].'</td>'.
            '<td class="font-weight-bold">'.$row['Clilelx'].'</td>'.
            '<td>'.$row['Clinomx'].'</td>'.
            '<td>'.$row['CalTip'].$row['CalDes'].$row['PreNro'].'</td>'.
            '<td>'.
                '<div class="btn-group btn-group-sm" role="group">'.
                    '<a class="btn text-info" title="Descargar documento" onclick="sendData('.$row['InscriNro'].')" id="'.$row['InscriNro'].'" 
                    data-clinomx="'.$row['Clinomx'].'" data-clilelx="'.$row['Clilelx'].'" data-caldes="'.$row['CalDes'].'" data-caltip="'.$row['CalTip'].'" data-prenro="'.$row['PreNro'].'" data-nomfircon="'.$row['NomFirCon'].'" data-UrbDes="'.$row['UrbDes'].'" data-UrbTip="'.$row['UrbTip'].'" data-inscrinro="'.$row['InscriNro'].'"><i class="fa fa-download"></i></a>'.
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