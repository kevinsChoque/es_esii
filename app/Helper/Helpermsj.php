<?php
namespace App\Helper;

use Session;
use Mail;

class Helpermsj
{
	public function redirectCorrect($mensaje, $routeRedirect)
	{
		Session::flash('globalMessage', $mensaje);
		Session::flash('type', 'success');

		return redirect($routeRedirect);
	}

	public function redirectAlert($mensaje, $routeRedirect)
	{
		Session::flash('globalMessage', $mensaje);
		Session::flash('type', 'notice');

		return redirect($routeRedirect);
	}

	public function redirectError($mensaje, $routeRedirect)
	{
		Session::flash('globalMessage', $mensaje);
		Session::flash('type', 'error');

		return redirect($routeRedirect);
	}
}
?>