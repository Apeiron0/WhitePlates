<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class ifnotMesero {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			
			return redirect()->guest('usuario/login');
		}
		else{
			if($this->auth->check()){

				if(!$this->auth->mesero()){
					return redirect('inicio');

				}
			}
		}
		return $next($request);
	}

}
