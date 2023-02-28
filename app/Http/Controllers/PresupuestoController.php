<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Models\TPresupuesto;
use App\Models\TDetalle;
use App\Models\TDatamed;
use App\Models\TSolicitud;
use App\Models\TMedicion;
use App\Models\TFactibilidad;

class PresupuestoController extends Controller
{
    protected $fpdf;
 
    public function __construct()
    {
        // $this->fpdf = new Fpdf;
        $this->fpdf = new FPDF('P','mm','A4');
    }
    public function actListoPresupuesto(Request $req)
    {
        return view('presupuesto.listoPresupuesto');
    }
	public function actCuadroPresupuestal(Request $req)
    {
    	return view('presupuesto.cuadroPresupuestal');
    }
    public function actPresupuesto(Request $req)
    {
    	return view('presupuesto.presupuesto');
    }
    public function actListarListos()
    {
        $registros = TMedicion::select('medicion.*','solicitud.*')
            ->leftjoin('solicitud','solicitud.solnro','=','medicion.solnro')
            ->where('medicion.estado','=','1')
            ->where('solicitud.estadoProceso','=','4')
            ->orderBy('medicion.idMed', 'DESC')
            ->get();
        return response()->json([
            "data"=>$registros,
        ]);
    }
	public function agregarCampAdi($model,$act,$req)
    {
        if($act)
        {$model->fr=now();}
        else
        {$model->fa=now();}
        return $model->save();
    }
    public function saveEditDetalle($req,$idPre)
    {
        $detalles=TDetalle::where('idPre',$idPre)->get();
        if($detalles!=null)
        {
            foreach ($detalles as $detalle) 
            {
                if(!$detalle->delete())
                {
                    return false;
                }
            }
        }
        return $this->saveDetalle($req,$idPre);
        // return true;
    }
    public function saveDetalle($req,$idPre)
    {
        // dd($req->all());
        if($req->ids!=null)
        {
            for ($i=0; $i < count($req->ids); $i++) 
            { 
            	$d=new TDetalle();
                $d->idPre=$idPre;
                $d->idCp=$req->ids[$i];
                $d->codigoCp=$req->cods[$i];
                $d->cantidad=$req->cantidades[$i];
                if(!$d->save())
                {
                    return false;
                }
            }
        }
        return true;
    }
    public function actRegistrar(Request $req)
    {
        // dd($req->all());
    	$tPre=TPresupuesto::create($req->all());
        if($this->agregarCampAdi($tPre,1,$req))
        {
            if($this->saveDetalle($req,$tPre->idPre))
            {
                $ts = TSolicitud::where('solnro',$tPre->solnro)->first();
                $ts->estadoProceso='5';
                if($ts->save())
                {
                    $ban = true;
                    return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
                }
                return response()->json(["msg"=>"Ocurrio un error.","estado"=>false]);
                // $serverName = 'informatica2-pc\sicem_bd';
                // $connectionInfo = array(
                //     "Database"=>"SICEM_AB",
                //     "UID"=>"es_esi",
                //     "PWD"=>"@emusap1@",
                //     "CharacterSet"=>"UTF-8"
                // );
                // $conn_sis = sqlsrv_connect($serverName,$connectionInfo);
                // if($conn_sis)
                // {
                //     $sql = "EXECUTE testEsi '$req->solnro', '5';";
                //     if($stmt = sqlsrv_query($conn_sis, $sql))
                //     {   return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
                //     else
                //     {   return response()->json(["msg"=>"Paso algo al momento de ejecutar procedimiento.","estado"=>true]);}
                // }
                // else
                // {   return response()->json(["msg"=>"Error en la conexion a la BD principal.","estado"=>true]);}
            }
        }
        return response()->json([
            "msg"=>"Ocurrio un error.",
            "estado"=>false
        ]);
    }
    public function actListar()
    {
    	$list=TPresupuesto::select('presupuesto.*','solicitud.numSoli')
            ->leftjoin('solicitud','solicitud.solnro','=','presupuesto.solnro')
            ->where('presupuesto.estado','!=','0')
            ->orderby('presupuesto.idPre','desc')
            ->get();
        // $list=TPresupuesto::
    	return response()->json([
            "data"=>$list,
        ]);
    }
    public function actEliminar(Request $req)
    {
        // $tPre = TPresupuesto::find($req->id);
        // if($tPre->delete())
        // {return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);}
        // else
        // {return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);}

        $tp = TPresupuesto::find($req->id);
        $tp->estado = '0';
        if($tp->save())
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        else
            return response()->json(["msg"=>"No se pudo proceder.","estado"=>false]);
    }
    public function actEditCuadroPresupuestal(Request $req)
    {
    	return view('presupuesto.editCuadroPresupuestal');
    }
    public function actEditCp(Request $req)
    {
        $tPre = TPresupuesto::find($req->id);
        // $listDetalle = TDetalle::where('idPre',$req->id)->get();
        $listDetalle = TDetalle::select('*')
            ->join('cuadro_presupuestal', 'cuadro_presupuestal.idCp', '=', 'detalle.idCp')
            ->where('detalle.idPre',$req->id)
            ->orderby('detalle.idDetalle','desc')
            ->get();
        // dd($req->id);
        return response()->json([
            "reg"=>$tPre,
            'listDetalle'=>$listDetalle,
        ]);
        // dd($req->id);
    }
    public function actGuardarCambios(Request $req)
    {
        // dd($req->all());
        $tPre = TPresupuesto::find($req->idPresupuesto);
        // dd($tPre);
        $tPre->fill($req->all());
        if($tPre->save() && $this->agregarCampAdi($tPre,0,$req))
        {
            if($this->saveEditDetalle($req,$tPre->idPre))
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
        }
        // dd($req->all());
    }
    public function actPrint(Request $req, $id=null)
    {
        // dd($id);
        $tPre = TPresupuesto::find($id);
        $listDetalle = TDetalle::select('*')
            ->join('cuadro_presupuestal', 'cuadro_presupuestal.idCp', '=', 'detalle.idCp')
            ->where('detalle.idPre',$id)
            ->orderby('detalle.idDetalle','asc')
            ->get();
        $fechaActual = date('d/m/Y');

        $marco = 1;
        $marco2 = 0;
        // $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->AddPage();
        
        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(190,5,'instalacion de conexcion domiciliarioa de desague 110mm',$marco2,1,'l');
        $this->fpdf->SetFont('Arial', 'B', 6);
        $this->fpdf->Cell(190,2,$fechaActual,$marco2,1,'l');
        // $this->fpdf->Cell(190,10,'-',$marco,1,'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Arial', 'B', 10);

        $this->fpdf->Cell(190,5,'PRESUPUESTO:',$marco2,1,'C');
$this->fpdf->Ln(1);
        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(20,5,'USUARIO:',$marco2,0,'l');
        $this->fpdf->Cell(170,5,$tPre->usuario,$marco2,1,'l');
        $this->fpdf->Cell(20,5,'DIRECCION',$marco2,0,'l');
        $this->fpdf->Cell(170,5,$tPre->direccion,$marco2,1,'l');
        $this->fpdf->Cell(20,5,'CODIGO:',$marco2,0,'l');
        $this->fpdf->Cell(170,5,$tPre->codigo,$marco2,1,'l');
$this->fpdf->Ln(1);

        $this->fpdf->SetFont('Arial', 'B', 7);
        $this->fpdf->Cell(120,13,'RUBROS',$marco,0,'C');
        $this->fpdf->Cell(10,13,'Unidad',$marco,0,'C');
        $this->fpdf->Cell(20,13,'Cantidad',$marco,0,'C');
        $this->fpdf->Cell(20,13,'',$marco,0,'C');
        $this->fpdf->Cell(20,13,'Costo Total',$marco,1,'C');
        $this->fpdf->Ln(0.5);

        $this->fpdf->Text(167, 52, 'Costo');
        $this->fpdf->Text(163, 54.5, 'unitario por');
        $this->fpdf->Text(165, 57, 'actividad');
// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $this->fpdf->Cell(120,60,'-',$marco,0,'L');
        $this->fpdf->Cell(10,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,1,'C');

        $orderColumn = 69;
        $unoTotal = 0;

        foreach ($listDetalle as $detalle) {
            $tarifa = str_replace(',', '.', $detalle->tarifa);
            $totalDetalle = (double)$detalle->cantidad*(double)$tarifa;
            $unoTotal = $unoTotal + $totalDetalle;
            $this->fpdf->Text(15, $orderColumn, $detalle->codigo);
            $this->fpdf->Text(23, $orderColumn, $detalle->actividad);
            $this->fpdf->Text(134, $orderColumn, $detalle->unidad);
            $this->fpdf->Text(149, $orderColumn, $detalle->cantidad);
            $this->fpdf->Text(167, $orderColumn, $tarifa);
            $this->fpdf->Text(186, $orderColumn, $totalDetalle);
            $orderColumn = $orderColumn + 4;
        }
        $this->fpdf->Text(12, 65, '1)');
        $this->fpdf->Text(23, 65, 'Costos Directos');
        $this->fpdf->Text(186, 65, $unoTotal);
        

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $dosTotal = (15/100) * $unoTotal;
        $dosTotal = round($dosTotal, 2);

        $sumaUnoDos = $unoTotal + $dosTotal;

        $igv = round((18/100) * $sumaUnoDos,2);

        $precioServicio = $sumaUnoDos + $igv;

        $this->fpdf->Cell(170,10,'  2)             Gastos Generales y Utilidad                                                                                                                15%',$marco,0,'L');
        $this->fpdf->Cell(20,10,$dosTotal,$marco,1,'C');
$this->fpdf->Ln(0.5);
        

        $this->fpdf->Cell(170,5,'Precio del Servicio Colateral sin IGV (1+2)',$marco,0,'C');
        $this->fpdf->Cell(20,5,$sumaUnoDos,$marco,1,'C');
$this->fpdf->Ln(0.5);

        $this->fpdf->Cell(170,5,'Precio del IGV',$marco,0,'C');
        $this->fpdf->Cell(20,5,$igv,$marco,1,'C');
$this->fpdf->Ln(0.5);
        $this->fpdf->Cell(170,5,'Precio del Servicio Colateral Total',$marco,0,'C');
        $this->fpdf->Cell(20,5,$precioServicio,$marco,1,'C');
        $this->fpdf->Ln(2);
        
         
        $this->fpdf->Output();

        exit;
    }
    public function actImprimir(Request $req)
    {
        $marco = 1;
        // $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->AddPage();
        // $this->fpdf->Text(10, 10, "Hello World!----");  
        // -----------------------------------------------------------------------------------------------

        // $this->fpdf->SetFont('Arial', 'B', 7);
        // $this->fpdf->Text(65, 100, 'RUBROS');
        // $this->fpdf->Text(130, 100, 'Unidad');
        // $this->fpdf->Text(145, 100, 'Cantidad');

        // $this->fpdf->Text(168, 100, 'Costo');
        // $this->fpdf->Text(165, 103, 'unitario por');
        // $this->fpdf->Text(166, 106, 'actividad');

        // $this->fpdf->Text(187, 100, 'Costo');
        // $this->fpdf->Text(187, 103, 'Total');
        // $this->fpdf->Cell(100,5,'',$marco,0,'C');
        // $this->fpdf->Ln(5);
        // --------------------------------------------------------------------------------------------------- 
        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(190,5,'instalacion de conexcion domiciliarioa de desague 110mm',$marco,1,'l');
        $this->fpdf->SetFont('Arial', 'B', 6);
        $this->fpdf->Cell(190,2,'22/11/2022',$marco,1,'l');
        // $this->fpdf->Cell(190,10,'-',$marco,1,'C');
        $this->fpdf->Ln(8);
        $this->fpdf->SetFont('Arial', 'B', 10);

// $this->fpdf->SetDrawColor(0,80,180);
// $this->fpdf->SetFillColor(0,0,0);
// $this->fpdf->SetTextColor(0,0,0);
// $this->fpdf->SetLineWidth(1);
        $this->fpdf->Cell(190,5,'PRESUPUESTO:',$marco,1,'C');
$this->fpdf->Ln(1);
        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(20,5,'USUARIO:',$marco,0,'l');
        $this->fpdf->Cell(170,5,'VEGA CUARESMA REYVELINDA',$marco,1,'l');
        $this->fpdf->Cell(20,5,'DIRECCION',$marco,0,'l');
        $this->fpdf->Cell(170,5,'JR. UNION',$marco,1,'l');
        $this->fpdf->Cell(20,5,'CODIGO:',$marco,0,'l');
        $this->fpdf->Cell(170,5,'11-1625',$marco,1,'l');
$this->fpdf->Ln(1);
        // $this->fpdf->Cell(190,5,'_________________________________________________________________________________________________',$marco,1,'C');

        $this->fpdf->SetFont('Arial', 'B', 7);
        $this->fpdf->Cell(120,13,'RUBROS',$marco,0,'C');
        $this->fpdf->Cell(10,13,'Unidad',$marco,0,'C');
        $this->fpdf->Cell(20,13,'Cantidad',$marco,0,'C');
        $this->fpdf->Cell(20,13,'',$marco,0,'C');
        $this->fpdf->Cell(20,13,'Costo Total',$marco,1,'C');
        $this->fpdf->Ln(0.5);

        $this->fpdf->Text(167, 52, 'Costo');
        $this->fpdf->Text(163, 54.5, 'unitario por');
        $this->fpdf->Text(165, 57, 'actividad');
// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        // $this->fpdf->Cell(4,70,'1)',$marco,0,'C');
        // $this->fpdf->Cell(8,70,'-',$marco,0,'C');
        $this->fpdf->Cell(120,60,'-',$marco,0,'L');
        $this->fpdf->Cell(10,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,0,'C');
        $this->fpdf->Cell(20,60,'-',$marco,1,'C');

        $this->fpdf->Text(12, 65, '1)');
        $this->fpdf->Text(23, 65, 'Costos Directos');
        $this->fpdf->Text(186, 65, '710.81');

        $this->fpdf->Text(15, 69, '10110');
        $this->fpdf->Text(23, 69, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 69, 'm');
        $this->fpdf->Text(149, 69, '3');
        $this->fpdf->Text(167, 69, '31.16');
        $this->fpdf->Text(186, 69, '93.48');

        $this->fpdf->Text(15, 73, '10110');
        $this->fpdf->Text(23, 73, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 73, 'm');
        $this->fpdf->Text(149, 73, '4');
        $this->fpdf->Text(167, 73, '13.04');
        $this->fpdf->Text(186, 73, '52.16');

        $this->fpdf->Text(15, 77, '10110');
        $this->fpdf->Text(23, 77, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 77, 'm');
        $this->fpdf->Text(149, 77, '4');
        $this->fpdf->Text(167, 77, '13.04');
        $this->fpdf->Text(186, 77, '52.16');

        $this->fpdf->Text(15, 81, '10110');
        $this->fpdf->Text(23, 81, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 81, 'm');
        $this->fpdf->Text(149, 81, '4');
        $this->fpdf->Text(167, 81, '13.04');
        $this->fpdf->Text(186, 81, '52.16');

        $this->fpdf->Text(15, 85, '10110');
        $this->fpdf->Text(23, 85, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 85, 'm2');
        $this->fpdf->Text(149, 85, '4');
        $this->fpdf->Text(167, 85, '13.04');
        $this->fpdf->Text(186, 85, '52.16');
        // -----
        $this->fpdf->Text(15, 89, '10110');
        $this->fpdf->Text(23, 89, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 89, 'm');
        $this->fpdf->Text(149, 89, '4');
        $this->fpdf->Text(167, 89, '13.04');
        $this->fpdf->Text(186, 89, '52.16');

        $this->fpdf->Text(15, 93, '10110');
        $this->fpdf->Text(23, 93, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 93, 'Und');
        $this->fpdf->Text(149, 93, '4');
        $this->fpdf->Text(167, 93, '13.04');
        $this->fpdf->Text(186, 93, '52.16');

        $this->fpdf->Text(15, 97, '10110');
        $this->fpdf->Text(23, 97, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 97, 'Und');
        $this->fpdf->Text(149, 97, '4');
        $this->fpdf->Text(167, 97, '13.04');
        $this->fpdf->Text(186, 97, '52.16');

        $this->fpdf->Text(15, 101, '10110');
        $this->fpdf->Text(23, 101, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 101, 'm');
        $this->fpdf->Text(149, 101, '4');
        $this->fpdf->Text(167, 101, '13.04');
        $this->fpdf->Text(186, 101, '52.16');

        $this->fpdf->Text(15, 105, '10110');
        $this->fpdf->Text(23, 105, 'exc. y ref. de zanja terreno semi rocoso para conexion de agua potable');
        $this->fpdf->Text(134, 105, 'm3');
        $this->fpdf->Text(149, 105, '4');
        $this->fpdf->Text(167, 105, '13.04');
        $this->fpdf->Text(186, 105, '52.16');

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        // $this->fpdf->Cell(4,5,'1)',$marco,0,'C');
        // $this->fpdf->Cell(8,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(108,5,'Costos directos',$marco,0,'L');
        // $this->fpdf->Cell(10,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'710.81',$marco,1,'C');

        // $this->fpdf->Cell(4,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(8,5,'10110',$marco,0,'C');
        // $this->fpdf->Cell(108,5,'Costos directos',$marco,0,'L');
        // $this->fpdf->Cell(10,5,'m',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'3',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'31.16',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'710.81',$marco,1,'C');

        // $this->fpdf->Cell(4,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(8,5,'10110',$marco,0,'C');
        // $this->fpdf->Cell(108,5,'Costos directos',$marco,0,'L');
        // $this->fpdf->Cell(10,5,'m',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'3',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'31.16',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'710.81',$marco,1,'C');
// -------------------------------
        // $this->fpdf->Cell(4,5,'2)',$marco,0,'C');
        // $this->fpdf->Cell(8,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(108,5,'Gastos Generales y Utilidad',$marco,0,'L');
        // $this->fpdf->Cell(10,5,'15%',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'-',$marco,0,'C');
        // $this->fpdf->Cell(20,5,'106.62',$marco,1,'C');

        $this->fpdf->Cell(170,10,'  2)             Gastos Generales y Utilidad                                                                                                                15%',$marco,0,'L');
        $this->fpdf->Cell(20,10,'106.62',$marco,1,'C');
$this->fpdf->Ln(0.5);
        $this->fpdf->Cell(170,5,'Precio del Servicio Colateral sin IGV (1+2)',$marco,0,'C');
        $this->fpdf->Cell(20,5,'106.62',$marco,1,'C');
$this->fpdf->Ln(0.5);
        $this->fpdf->Cell(170,5,'Precio del IGV',$marco,0,'C');
        $this->fpdf->Cell(20,5,'106.62',$marco,1,'C');
$this->fpdf->Ln(0.5);
        $this->fpdf->Cell(170,5,'Precio del Servicio Colateral Total',$marco,0,'C');
        $this->fpdf->Cell(20,5,'106.62',$marco,1,'C');
        $this->fpdf->Ln(2);
        
         
        $this->fpdf->Output();

        exit;
        // dd($req->all());
    }
    public function actGetDatos(Request $req)
    {
        $ts = TSolicitud::where('solnro',$req->solnro)->first();
        $codigo = TFactibilidad::where('solnro',$req->solnro)->first()->codigo;
        return response()->json([
            "data"=>$ts,
            "codigo"=>$codigo,
        ]);
    }
    public function actFinalizarProceso(Request $req)
    {
        $tp = TPresupuesto::find($req->idPre);
        $tp->culminacionProceso='1';
        $ts = TSolicitud::where('solnro',$tp->solnro)->first();
        $ts->estadoProceso='6';
        if($tp->save() && $ts->save())
        {
            return response()->json(["msg"=>"Operacion exitosa.","estado"=>true]);
        }
        return response()->json(["msg"=>"No se pudo cambiar de personal.","estado"=>false]);
    }

}
