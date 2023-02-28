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
    	$pdf = new Fpdf('P','mm','a4');
		$pdf->AddPage();
		// $pdf->Cell(0,25,'',$marco,1,'C');
		// $pdf->Image('img/logosf.png' , 10 ,10, 80 , 25);
		// $pdf->Cell(0,5,'--------------------------------------',$marco,1,'l');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(0,5,'Anexo N° 1',$smarco,1,'C');
		$pdf->Cell(0,5,'Anexo N° 1 del Reglamento de Calidad de la Prestación de los Servicios de Saneamiento Modelo de Solicitud de Acceso al Servicio de ',$smarco,1,'C');
		$pdf->Cell(0,5,'Agua y Alcantarillado',$smarco,1,'C');

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
		$pdf->Cell(110,3,'blanco',$smarco,0,'l');
		$pdf->Cell(50,10,'Numero de recibo de pago por factibilidad del servicio',$marco,0,'l');
		$pdf->Cell(0,10,'abancay',$marco,1,'l');

		$pdf->Cell(0,10,'',$smarco,1,'C');

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
