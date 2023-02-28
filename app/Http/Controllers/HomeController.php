<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Models\TUser;
use App\Models\TPersona;

class HomeController extends Controller
{
    // public function actHome(Request $req)
    // {
    // 	return view('dashboard.dashboard',['usuario'=>$req->usuario]);
    // }
    public function actHome(Request $req,SessionManager $sessionManager)
    {
        if($_POST)
        {
        	// dd($req->all());
        	$userAdmin = TUser::select('persona.*','user.*')
        		->leftjoin('persona','persona.idPersona','=','user.idPersona')
        		->where('persona.idCargo','2')
        		->where('user.usuario',$req->usuario)
        		->first();
        	if($userAdmin!=null)
        	{
        		// $user = TUser::where('usuario',$req->usuario)->first();
        		$user = TUser::select('persona.*','user.*')
	        		->leftjoin('persona','persona.idPersona','=','user.idPersona')
	        		->where('user.usuario',$req->usuario)
	        		->first();
	        	if($user == null)
	        	{	return $this->helpermsj->redirectAlert('El usuario no tiene acceso a la plataforma.', '/');}
        		if($user->password!=$req->password)
	        	{	return $this->helpermsj->redirectAlert('Contraseña incorrecta.', '/');}
		        $sessionManager->put('user',$user);
		        $sessionManager->put('idCargo',$user->idCargo);
		     //    echo('admin');
			    // dd($user->idCargo);
	            return view('dashboard.dashboard');
        	}
        	else
        	{
        		// $user = TUser::where('usuario',$req->usuario)->first();
        		$user = TUser::select('persona.*','user.*')
	        		->leftjoin('persona','persona.idPersona','=','user.idPersona')
	        		->where('user.usuario',$req->usuario)
	        		->first();
	        	if($user == null)
	        	{	return $this->helpermsj->redirectAlert('El usuario no tiene acceso a la plataforma.', '/');}
	        	if($user->password!=$req->password)
		        {	return $this->helpermsj->redirectAlert('Contraseña incorrecta.', '/');}
			    $sessionManager->put('user',$user);
			    $sessionManager->put('idCargo',$user->idCargo);
			    // echo('usuario');
			    // echo($user);
			    // dd($user);

	            return view('dashboard.dashboard');
        	}
        }
        // return view('home');
        return view('dashboard.dashboard');
    }
    public function actLogout(Request $request,SessionManager $sessionManager)
    {
        $sessionManager->flush();

        return redirect('/');
    }
}
