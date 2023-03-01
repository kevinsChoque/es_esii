<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class Sol2Controller extends Controller
{
	protected $fpdf;
 
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function actImprimirPdf()
    {
    	$marco = 1;
    	$smarco = 0;
    	$blanco = 'blanco';
    	$fondo = true;
    	$tam = 3.5;

    	$pdf = new Fpdf('P','mm','a4');
    	$pdf->SetFont('Arial','',6);
		$pdf->AddPage();
		// --------------------------------cabecera
		$pdf->Cell(140,15,'',$marco,0,'C');
		$pdf->Image('img/banner.png' , 10 ,10, 80 , 15);
		$pdf->Cell(0,5,utf8_decode('Página: 1 de 1'),$marco,1,'R');
		$pdf->Cell(0,5,utf8_decode('Fecha de Emisión: '),$marco,1,'R');
		$pdf->Cell(0,5,'Hora: ',$marco,1,'R');
		// --------------------------------fin
		// --------------------------------titulo
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(0,4,utf8_decode('Anexo N° 1'),$smarco,1,'C');
		$pdf->Cell(0,4,utf8_decode('Anexo N° 1 del Reglamento de Calidad de la Prestación de los Servicios de Saneamiento Modelo de Solicitud de Acceso al Servicio de '),$smarco,1,'C');
		$pdf->Cell(0,4,'Agua y Alcantarillado',$smarco,1,'C');
		$pdf->Ln(3);
		// --------------------------------fin
		// --------------------------------data
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(40,3,'Nro. De Solicitud:',$smarco,0,'l');
		$pdf->Cell(50,3,'$numeroPedido',$marco,0,'l');
		$pdf->Cell(20,3,'blanco',$smarco,0,'l');
		$pdf->Cell(50,3,'Lugar',$marco,0,'l');
		$pdf->Cell(0,3,'Abancay',$marco,1,'l');

		$pdf->Cell(40,3,'Fecha de Solicitud:',$smarco,0,'l');
		$pdf->Cell(50,3,'$numeroPedido',$marco,0,'l');
		$pdf->Cell(20,3,'blanco',$smarco,0,'l');
		$pdf->Cell(50,3,'Fecha',$marco,0,'l');
		$pdf->Cell(0,3,'abancay',$marco,1,'l');

		$pdf->Cell(40,3,'Fecha de Vencimiento:',$smarco,0,'l');
		$pdf->Cell(50,3,'$numeroPedido',$marco,0,'l');
		$pdf->Cell(20,3,'blanco',$smarco,0,'l');
		$pdf->Cell(50,3,'Empresa Prestadora',$marco,0,'l');
		$pdf->Cell(0,3,'EMUSAP ABANCAY',$marco,1,'l');

		// $pdf->Cell(40,3,'Numero de solicitud:',$smarco,0,'l');
		// $pdf->Cell(50,3,'$numeroPedido',$marco,0,'l');
		$pdf->Cell(110,3,'blanco',$smarco,0,'C');
		$pdf->Cell(50,7,"Numero de recibo de pago por factibilidad del servicio",$marco,0,'l');
		// $pdf->MultiCell(50,4,"Numero de recibo de pago por\nfactibilidad del servicio", 1,'J', 0, 0, '', '', false, null, false);
		$pdf->Cell(0,7,'abancay',$marco,1,'l');
		// $pdf->Multicell(0,2,"This is a multi-line text string\nNew line\nNew line",1,1,'R');
		// $strText = str_replace("\n","<br>",$strText);
		// $pdf->MultiCell(0,2,"Numero de recibo de pago por\nfactibilidad del servicio", 1, 'J', 0, 1, '', '', true, null, true);
		// $pdf->Cell(0,2,$blanco,$marco,1,'C');
		// --------------------------------fin
		// --------------------------------data solicitante
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(0,4,'I. DATOS DEL SOLICITANTE',$marco,1,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(80,$tam,'${solnombre}:',$marco,0,'C');
		$pdf->Cell(20,$tam,'${solelect}',$marco,0,'C');
		$pdf->Cell(0,$tam,'Correo',$marco,1,'C');
        // $pdf->SetTextColor(85,107,47);
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(80,$tam,'Nombre',$marco,0,'C',$fondo);
		$pdf->Cell(20,$tam,'DNI',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'CORREO ELECTRONICO',$marco,1,'C',$fondo);

		$pdf->Cell(80,$tam,'${soltipcal} - ${soldirec} ${soldirnro}',$marco,0,'C');
		$pdf->Cell(20,$tam,'${soldirnro}',$marco,0,'C');
		$pdf->Cell(40,$tam,'manzana',$marco,0,'C');
		$pdf->Cell(0,$tam,'lote',$marco,1,'C');
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(80,$tam,'Domicilio (Calle, Jirón, Avenida)',$marco,0,'C',$fondo);
		$pdf->Cell(20,$tam,utf8_decode('Nº'),$marco,0,'C',$fondo);
		$pdf->Cell(40,$tam,'MZ',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'Lt',$marco,1,'C',$fondo);

		$pdf->Cell(45,$tam,'${solurban}',$marco,0,'C');
		$pdf->Cell(35,$tam,'Abancay',$marco,0,'C');
		$pdf->Cell(0,$tam,'Abancay',$marco,1,'C');
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(45,$tam,utf8_decode('Urbanización, barrio'),$marco,0,'C',$fondo);
		$pdf->Cell(35,$tam,'Provincia',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'Distrito',$marco,1,'C',$fondo);
		// --------------------------------fin
		// --------------------------------data representante
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(0,4,utf8_decode('II. DATOS DE REPRESENTANTE (Adjuntar Autorización):'),$marco,1,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(80,$tam,'${solnombre}:',$marco,0,'C');
		$pdf->Cell(20,$tam,'${solelect}',$marco,0,'C');
		$pdf->Cell(0,$tam,'Correo',$marco,1,'C');
        // $pdf->SetTextColor(85,107,47);
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(80,$tam,'Nombre',$marco,0,'C',$fondo);
		$pdf->Cell(20,$tam,'DNI',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'CORREO ELECTRONICO',$marco,1,'C',$fondo);

		$pdf->Cell(80,$tam,'${soltipcal} - ${soldirec} ${soldirnro}',$marco,0,'C');
		$pdf->Cell(20,$tam,'${soldirnro}',$marco,0,'C');
		$pdf->Cell(40,$tam,'manzana',$marco,0,'C');
		$pdf->Cell(0,$tam,'lote',$marco,1,'C');
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(80,$tam,'Domicilio (Calle, Jirón, Avenida)',$marco,0,'C',$fondo);
		$pdf->Cell(20,$tam,utf8_decode('Nº'),$marco,0,'C',$fondo);
		$pdf->Cell(40,$tam,'MZ',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'Lt',$marco,1,'C',$fondo);

		$pdf->Cell(45,$tam,'${solurban}',$marco,0,'C');
		$pdf->Cell(35,$tam,'Abancay',$marco,0,'C');
		$pdf->Cell(0,$tam,'Abancay',$marco,1,'C');
		$pdf->SetFillColor(181,178,178);
		$pdf->Cell(45,$tam,utf8_decode('Urbanización, barrio'),$marco,0,'C',$fondo);
		$pdf->Cell(35,$tam,'Provincia',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'Distrito',$marco,1,'C',$fondo);
		// --------------------------------fin
		// --------------------------------data predio
		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(0,4,utf8_decode('III. DATOS DEL PREDIO (marca con “X”)'),$marco,1,'L');
		$pdf->SetFont('Arial','',7);
		$pdf->SetFillColor(181,178,178);

		$pdf->Cell(30,$tam,'${preo1}',$marco,0,'C',$fondo);
		$pdf->Cell(110,$tam,utf8_decode('En construcción'),$marco,0,'L');
		$pdf->Cell(0,$tam,'',$marco,1,'C');
		$pdf->Cell(30,$tam,'${preo1}',$marco,0,'C',$fondo);
		$pdf->Cell(110,$tam,utf8_decode('Habilitado'),$marco,0,'L');
		$pdf->Cell(0,$tam,'',$marco,1,'C');
		$pdf->Cell(30,$tam,'${preo1}',$marco,0,'C',$fondo);
		$pdf->Cell(110,$tam,utf8_decode('Otros (especificar) TERRENO'),$marco,0,'L');
		$pdf->Cell(0,$tam,'',$marco,1,'C');

		$pdf->Cell(45,$tam,'${preubicacion}',$marco,0,'C');
		$pdf->Cell(30,$tam,'${prenumero}',$marco,0,'C');
		$pdf->Cell(35,$tam,'${premanzana}',$marco,0,'C');
		$pdf->Cell(30,$tam,'${prelote}',$marco,0,'C');
		$pdf->Cell(0,$tam,'',$marco,1,'C');
		$pdf->Cell(45,$tam,utf8_decode('Ubicación (Calle, Jirón, Avenida)'),$marco,0,'C',$fondo);
		$pdf->Cell(30,$tam,utf8_decode('Nº'),$marco,0,'C',$fondo);
		$pdf->Cell(35,$tam,'Mz',$marco,0,'C',$fondo);
		$pdf->Cell(30,$tam,'Lt',$marco,0,'C',$fondo);
		$pdf->Cell(0,$tam,'',$marco,1,'C');

		$pdf->Cell(30,$tam,'Referencia',$marco,0,'C');
		$pdf->Cell(110,$tam,utf8_decode('${prereferencia}'),$marco,0,'L');
		$pdf->Cell(0,$tam,'',$marco,1,'C');
		// --------------------------------fin
		// --------------------------------texto
		$pdf->SetFont('Arial','B',7.5);
		$pdf->MultiCell(0,4,"OBLIGATORIO: Contar mínimo con un punto de agua (llave general y caño) en el interior del predio, caso contrario no se probará el informe de\nFACTIBILIDAD de servicio de acuerdo a la normativa.", 1, 'J', 0, 1, '', '', true, null, true);
		$pdf->SetFont('Arial','',7.5);
		$pdf->Cell(0,4,'Mediante la presente solicitud el solicitante manifiesta su voluntad de acceder a la presentación de los siguientes servicios.',$marco,1,'L');
		// --------------------------------fin
		// --------------------------------servicio
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(0,4,utf8_decode('(Marque con una “X” indicando el tipo de servicio)'),$marco,1,'L');

		$pdf->Cell(30,8,'${pban1}',$marco,0,'C',$fondo);
		$pdf->Cell(70,8,'Servicio de Agua Potable',$marco,0,'L');

		$pdf->Cell(30,4,'X',$marco,0,'C');
		$pdf->Cell(30,4,utf8_decode('Conexión Domiciliaria'),$marco,0,'L');
		$pdf->Cell(0,4,'',$marco,1,'C');

		$pdf->Cell(100,4,'',$marco,0,'C');

		$pdf->Cell(30,4,'',$marco,0,'C');
		$pdf->Cell(30,4,utf8_decode('Pileta Publica'),$marco,0,'L');
		$pdf->Cell(0,4,'',$marco,1,'C');

		$pdf->Cell(30,4,'${pban2}',$marco,0,'C',$fondo);
		$pdf->Cell(70,4,'Servicio de Alcantarillado Sanitario',$marco,0,'L');
		$pdf->Cell(0,4,'',$marco,1,'C');
		// --------------------------------fin
		// --------------------------------CATEGORIA
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(0,4,utf8_decode('(Señalar el # unidades de uso atendidas en c/categoría)'),$marco,1,'L');

		$pdf->SetFont('Arial','B',7);
		$pdf->Cell(30,4,'Residencial',$marco,0,'C');
		$pdf->Cell(70,4,utf8_decode('Nº de unidades de uso que serán atendidas'),$marco,0,'C');
		$pdf->Cell(30,4,'No Residencial',$marco,0,'C');
		$pdf->Cell(0,4,utf8_decode('Nº de unidades de uso que serán atendidas'),$marco,1,'C');
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(30,4,'Domestico',$marco,0,'L');
		$pdf->Cell(70,4,'${pcat1}',$marco,0,'C');
		$pdf->Cell(30,4,'Comercial y Otros',$marco,0,'L');
		$pdf->Cell(0,4,'X',$marco,1,'C');

		$pdf->Cell(30,4,'Social',$marco,0,'L');
		$pdf->Cell(70,4,'${pcat2}',$marco,0,'C');
		$pdf->Cell(30,4,'Industrial',$marco,0,'L');
		$pdf->Cell(0,4,'X',$marco,1,'C');

		$pdf->Cell(100,4,'',$marco,0,'C');
		$pdf->Cell(30,4,'Estatal',$marco,0,'L');
		$pdf->Cell(0,4,'X',$marco,1,'C');
		// $pdf->Cell(0,4,'',$marco,1,'C');
		// --------------------------------fin
		// --------------------------------algo
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(0,4,utf8_decode('(Marca con una X y señalar # meses, según corresponda)'),$marco,1,'L');

		$pdf->Cell(30,4,'${puso1}',$marco,0,'C');
		$pdf->Cell(70,4,'Permanente',$marco,0,'L');
		$pdf->Cell(0,4,'',$marco,1,'C');

		$pdf->Cell(30,4,'${puso2}',$marco,0,'C');
		$pdf->Cell(25,4,'Temporal',$marco,0,'L');
		$pdf->Cell(20,4,utf8_decode('Nº meses:'),$marco,0,'L');
		$pdf->Cell(25,4,'${pmeses}',$marco,0,'L');
		$pdf->Cell(0,4,'',$marco,1,'C');
		// --------------------------------fin
		// --------------------------------items
		$pdf->SetFont('Arial','',6.5);
		$pdf->Cell(0,4,utf8_decode('La conexión se solicita para ser instalada en el predio ubicado en el predio ubicado en el numeral III. Por lo cual adjunto copia de los documentos siguientes:'),$marco,1,'L');

		$pdf->SetFont('Arial','',7);
		$pdf->Cell(30,4,'${item1}',$marco,0,'C',$fondo);
		$pdf->Cell(0,4,utf8_decode('Documento que acredita la propiedad, titulo posesorio o certificado de posesión del predio, según corresponda'),$marco,1,'L');

		$pdf->Cell(30,4,'${item2}',$marco,0,'C',$fondo);
		$pdf->Cell(0,4,utf8_decode('Plano de Ubicación del predio, el cual deberá detallar la ubicación de la conexión de agua y/o alcantarillado'),$marco,1,'L');

		$pdf->Cell(30,4,'${item3}',$marco,0,'C',$fondo);
		$pdf->Cell(0,4,utf8_decode('Documento que acredite la representación, de ser el caso'),$marco,1,'L');

		$pdf->Cell(30,4,'${item4}',$marco,0,'C',$fondo);
		$pdf->Cell(0,4,utf8_decode('Certificado de vigencia de poder, para el caso de personas jurídicas'),$marco,1,'L');
		$pdf->Cell(30,8,'${item5}',$marco,0,'C',$fondo);
		$pdf->MultiCell(0,4,utf8_decode("Memoria descriptiva de instalaciones sanitarias internas de agua y desagüe firmada ingeniero sanitario colegiado y habilitado\n(Conexión domiciliaria de Agua Potable de un diámetro mayor a 15mm)"), 1, 'J', 0, 1, '', '', true, null, true);

		$pdf->Cell(30,8,'${item6}',$marco,0,'C',$fondo);
		$pdf->MultiCell(0,4,utf8_decode("Plano de instalaciones sanitarias internas de agua y desagüe, firmado ingeniero sanitario colegiado y habilitado (Conexión\ndomiciliaria de Agua Potable de un diámetro a 15mm)"), 1, 'J', 0, 1, '', '', true, null, true);

		$pdf->Cell(30,4,'${item7}',$marco,0,'C',$fondo);
		$pdf->Cell(0,4,utf8_decode('Otros: ${otros}'),$marco,1,'L');
		// --------------------------------fin
		// --------------------------------firma
		$pdf->SetFont('Arial','',5);
		$pdf->Cell(30,3,'Atentamente',$marco,0,'L');
		$pdf->Cell(50,3,'',$marco,0,'L');
		$pdf->Cell(0,3,'SELLO DE RECEPCION',$marco,1,'L');

		$pdf->Cell(0,20,$blanco,$marco,1,'C');

		$pdf->Cell(0,20,$blanco,$marco,0,'C');
		$pdf->Cell(0,20,$blanco,$marco,0,'C');
		$pdf->Cell(0,20,$blanco,$marco,1,'C');
		// --------------------------------fin
		$pdf->Ln(10);













		$pdf->Cell(25,5,'Transaccion:',$marco,0,'l');
		$pdf->Cell(0,5,'$id',$marco,1,'l');
		$pdf->Cell(25,5,'Fecha:',$marco,0,'l');
		$pdf->Cell(0,5,'$fechaHoraPago',$marco,1,'l');
		$pdf->Cell(0,5,'-------------------------------------------------------------------',$marco,1,'l');
		$pdf->Cell(25,5,'Inscripcion:',$marco,0,'l');
		$pdf->Cell(0,5,'$numInscripcion',$marco,1,'l');
		$pdf->Cell(25,5,'Cliente:',$marco,0,'l');
		$pdf->Cell(0,5,'$nombreCompleto',$marco,1,'l');
		$pdf->Cell(25,5,'Direccion:',$marco,0,'l');
		$pdf->Cell(0,5,'$direccion',$marco,1,'l');
		$pdf->Cell(25,5,'Nro.Recibo:',$marco,0,'l');
		$pdf->Cell(0,5,'$numRecibo',$marco,1,'l');
		$pdf->Cell(25,5,'Periodo:',$marco,0,'l');
		$pdf->Cell(0,5,'$periodo',$marco,1,'l');

		$pdf->Cell(25,1,' ',$marco,0,'l');
		$pdf->Cell(0,1,'-----------------------',$marco,1,'l');
		$pdf->Cell(25,5,'Total:',$marco,0,'l');
		$pdf->Cell(0,5,'$importePagado',$marco,1,'l');
		$pdf->Cell(25,1,' ',$marco,0,'l');
		$pdf->Cell(0,1,'-----------------------',$marco,1,'l');

		$pdf->Cell(25,5,'Cajero:',$marco,0,'l');
		$pdf->Cell(0,5,'PAGO ONLINE',$marco,1,'l');
		$pdf->Output();

		// $this->fpdf->SetFont('Arial', 'B', 15);
  //       $this->fpdf->AddPage("L", ['100', '100']);
  //       $this->fpdf->Text(10, 10, "Hello World!");       
         
  //       $this->fpdf->Output();
        exit;
    }
}
