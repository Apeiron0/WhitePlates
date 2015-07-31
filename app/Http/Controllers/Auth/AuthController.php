<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
class AuthController extends Controller {
	protected $auth;
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function postAutentificar(Request $request)
	{
		
		$this->validate($request, [
			'username' => 'required', 'password' => 'required',
		]);
		/*$credentials = $request->only('username', 'password');*/
		$credenciales=(array(
				'username' => $request->get('username'),
				'password'=>$request->get('password'),
				'active'=>'1',
			));
		
		if ($this->auth->attempt($credenciales, $request->has('remember')))
		{
			return redirect()->intended('inicio');
		}

		return redirect('/')
					->withInput($request->only('username', 'remember'))
					->withErrors([
						'username' => 'Usuario y contraseña no coinciden, o usuario inactivo.',
					]);
	}

	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}
	public function getLogin()
	{
		return view('auth.login');
	}
}
