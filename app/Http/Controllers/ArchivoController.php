<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TArchivo;

class ArchivoController extends Controller
{
    public function actRegistrarSoli(Request $req)
    {
    	// dd($req->all());
    	$file = $req->file('file');
    	$identificador = Str::uuid()->toString();
        $fileName =$identificador.'_'.str_replace(' ', '_', $file->getClientOriginalName());

        // if(file_exists('imagenes/'.$req->codigoFajaImg))
        // {
        //     $banRmdir=$this->rrmdir('imagenes/'.$req->codigoFajaImg);
        // }

        $rutaArchivo = 'archivos_solicitud/'.$req->solnroFileSoli.'/';

        $banSave = $file->move(public_path($rutaArchivo),$fileName);
        $path=public_path($rutaArchivo.$fileName);
        // if($this->verifyDomain())
        // {
        //     $banSave = $file->move(public_path($rutaArchivo),$fileName);
        //     $path=public_path($rutaArchivo.$fileName);
        // }
        // else
        // {
        //     $banSave = $file->move($rutaArchivo,$fileName);
        //     $path=$rutaArchivo.$fileName;
        // }
        if($banSave)
        {
            $req['idSolicitud']=$req->solnroFileSoli;
            $req['tipo']='solicitud';
            $req['ruta']=$rutaArchivo.$fileName;
            $req['fechaRegistro']=now();
            $ta=TArchivo::create($req->all());
            if($ta!=null)
                return response()->json(["msg"=>"Se guardo el archivo.","estado"=>true]);
        }
        return response()->json(["msg"=>"Ocurrio un error en el registro de archivos.","estado"=>false]);
    }
    public function actListarSoli(Request $req)
    {
        // dd('listar');
        $ta = TArchivo::where('idSolicitud',$req->idSolicitud)->get();
        return response()->json(["data"=>$ta,]);
    }
    public function actEliminar(Request $req)
    {
        // dd($req->all());
        $ta = TArchivo::find($req->idArchivo);
        if(unlink($ta->ruta))
        {
            if($ta->delete())
            {
                return response()->json([
                    "msg"=>"Operacion exitosa.",
                    "estado"=>true
                ]);
            }
        }
        return response()->json([
            "msg"=>"No se pudo realizar el proceso.",
            "estado"=>false
        ]);
    }
    public function actEditar(Request $req)
    {
        $ta = TArchivo::find($req->idArchivo);
        return response()->json(["data"=>$ta,]);
    }
    public function actGuardarCambios(Request $req)
    {
        // dd($req->all());
        $ta = TArchivo::find($req->eidArchivo);
        if(unlink($ta->ruta))
        {
            $file = $req->file('file');
            $identificador = Str::uuid()->toString();
            $fileName =$identificador.'_'.str_replace(' ', '_', $file->getClientOriginalName());

            $rutaArchivo = 'archivos_'.$ta->tipo.'/'.$ta->idSolicitud.'/';

            if($file->move(public_path($rutaArchivo),$fileName))
            {
                $ta->nombreFile = $req->enombreFile;
                $ta->descripcion = $req->edescripcion;
                $ta->ruta = $rutaArchivo.$fileName;
                $ta->fechaActualizacion = now();
                if($ta->save())
                    return response()->json(["msg"=>"Se guardo los cambios correctamente.","estado"=>true]);
            }
        }
        
        return response()->json(["msg"=>"Ocurrio un error en el registro de archivos.","estado"=>false]);
    }
    public function actRegistrarFact(Request $req)
    {
        $file = $req->file('file');
        $identificador = Str::uuid()->toString();
        $fileName =$identificador.'_'.str_replace(' ', '_', $file->getClientOriginalName());

        $rutaArchivo = 'archivos_factibilidad/'.$req->idRegistro.'/';

        $banSave = $file->move(public_path($rutaArchivo),$fileName);
        $path=public_path($rutaArchivo.$fileName);
        
        if($banSave)
        {
            $req['idFac']=$req->idRegistro;
            $req['tipo']='factibilidad';
            $req['ruta']=$rutaArchivo.$fileName;
            $req['fechaRegistro']=now();
            $ta=TArchivo::create($req->all());
            if($ta!=null)
                return response()->json(["msg"=>"Se guardo el archivo.","estado"=>true]);
        }
        return response()->json(["msg"=>"Ocurrio un error en el registro de archivos.","estado"=>false]);
    }
    public function actListarFact(Request $req)
    {
        $ta = TArchivo::where('idFac',$req->idFac)->get();
        return response()->json(["data"=>$ta]);
    }
    public function actRegistrarMedi(Request $req)
    {
        $file = $req->file('file');
        $identificador = Str::uuid()->toString();
        $fileName =$identificador.'_'.str_replace(' ', '_', $file->getClientOriginalName());

        $rutaArchivo = 'archivos_medicion/'.$req->idRegistro.'/';

        $banSave = $file->move(public_path($rutaArchivo),$fileName);
        $path=public_path($rutaArchivo.$fileName);
        
        if($banSave)
        {
            $req['idMed']=$req->idRegistro;
            $req['tipo']='medicion';
            $req['ruta']=$rutaArchivo.$fileName;
            $req['fechaRegistro']=now();
            $ta=TArchivo::create($req->all());
            if($ta!=null)
                return response()->json(["msg"=>"Se guardo el archivo.","estado"=>true]);
        }
        return response()->json(["msg"=>"Ocurrio un error en el registro de archivos.","estado"=>false]);
    }
    public function actListarMedi(Request $req)
    {
        $ta = TArchivo::where('idMed',$req->idMed)->get();
        return response()->json(["data"=>$ta]);
    }
    public function actRegistrarPres(Request $req)
    {
        $file = $req->file('file');
        $identificador = Str::uuid()->toString();
        $fileName =$identificador.'_'.str_replace(' ', '_', $file->getClientOriginalName());

        $rutaArchivo = 'archivos_presupuesto/'.$req->idRegistro.'/';

        $banSave = $file->move(public_path($rutaArchivo),$fileName);
        $path=public_path($rutaArchivo.$fileName);
        
        if($banSave)
        {
            $req['idPre']=$req->idRegistro;
            $req['tipo']='presupuesto';
            $req['ruta']=$rutaArchivo.$fileName;
            $req['fechaRegistro']=now();
            $ta=TArchivo::create($req->all());
            if($ta!=null)
                return response()->json(["msg"=>"Se guardo el archivo.","estado"=>true]);
        }
        return response()->json(["msg"=>"Ocurrio un error en el registro de archivos.","estado"=>false]);
    }
    public function actListarPres(Request $req)
    {
        $ta = TArchivo::where('idPre',$req->idPre)->get();
        return response()->json(["data"=>$ta]);
    }
}
