<?php 
use App\Models\Personal;
use App\Models\Orden;
use App\Models\User;
use App\Models\Ingrediente;
use App\Models\CategoriaIngrediente;
use App\Models\Platillo;
use Carbon\Carbon;
use App\Models\Venta;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/','Auth\AuthController@getLogin');
Route::get('inicio', 'HomeController@index');
/*Route::get('caj','CajeroController@prueba');*/

/*Route::resource('user', 'UserController');
Route::resource('personal_usuarios', 'Personal_UsuariosController');
Route::resource('personal', 'PersonalController');
Route::resource('rol', 'RolController');*/
Route::controllers([
	'usuario' => 'Auth\AuthController',
	'cajero'=>'CajeroController',
	'cocina'=>'CocinaController',
	'administrador'=>'AdministradorController',
	'personal'=>'PersonalController',
	'usuarios'=>'UserController',
	'gerente'=>'GerenteController',
	'mesero'=>'MeseroController',
	'encargadomeseros'=>'DepaMeseroController',
	'reportes'=>'ReportesController',
]);

Route::get('ordenes','CajeroController@ordenes');

Route::get('example2',function(){
	/*$toda= Carbon::now()->setTime(00,00,00);*/
	$toda= Carbon::toDay()->toDateString();
	/*return $toda;*/
	
	/*return Orden::where('DATE(created_at)','=',$toda)->count();	*/
	/*return Orden::all();*/
	/*$users = Orden::where(DB::raw('DATE(created_at)'), $toda)->get()->sum('platillo_count');*/
	/*return $users;*/
	/*return Orden::where('created_at','=>',$toda.' 00:00:00')->get();*/
	/*$total=Orden::where(DB::raw('DATE(created_at)'), $toda)->with('platillos')->get()->sum('platillo_total');
	return $total;*/
	/*return Auth::user()->personal->id;*/
	/*return DB::select(DB::raw("SELECT
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '01') 'Enero',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '02') 'Febrero',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '03') 'Marzo',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '04') 'Abril',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '05') 'Mayo',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '06') 'Junio',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '07') 'Julio',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '08') 'Agosto',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '09') 'Septiembre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '10') 'Octubre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '11') 'Noviembre',
		(SELECT SUM(ventas.total) FROM ventas WHERE MONTH (ventas.fecha) = '12') 'Diciembre'
		FROM ventas where YEAR(ventas.fecha)='2015' LIMIT 1"));*/
	/*return DB::select(DB::raw("SELECT nombre, sum(cantidad) as 'Cantidad' from (((pruebacopadeleche.platillos inner join pruebacopadeleche.orden_tiene_platillos on platillos.id=orden_tiene_platillos.idplatillo)inner join ordenes on orden_tiene_platillos.idorden=ordenes.id) inner join venta_tiene_ordenes on ordenes.id=venta_tiene_ordenes.idorden) inner join ventas on venta_tiene_ordenes.idventa=ventas.id where fecha between '2014-01-20' and '2015-03-23' group by nombre order by Cantidad;"));*/
	/*return DB::select(DB::raw("SELECT personal.id,personal.nombre, sum(ventas.total) as 'Vendido' from (((personal inner join puestos on personal.puesto_id=puestos.id) inner join ordenes on personal.id=ordenes.idpersonal) inner join venta_tiene_ordenes on ordenes.id=venta_tiene_ordenes.idorden) inner join ventas on venta_tiene_ordenes.idventa=ventas.id where puestos.nombre='Cajero' and fecha between '2014-03-20' and '2015-03-23' group by personal.id;"));*/
	/*$personal = Personal::whereHas('puesto', function($q)
		{
		    $q->where('nombre', '=', 'Mesero')->orWhere('nombre','=','Cajero');

		})->get();
	return $personal;*/
	/*return Platillo::with('subcategoria.categoria')->get();*/
	/*return Platillo::find(1)->with('ingredientes')->get();*/
	return Venta::where('fecha','=','2015-03-18')->with('personal')->get();
	
});
/*Route::post("Login",'Auth\AuthController@postAutentificar');*/
Route::get('example',function(){
	/*print_r(Auth::user()->personal()->first()->personal()->first()->roles_id);*/
	/*print_r(Auth::user()->Personal()->first()->Personal()->first()->Rol()->first()->tipo);*/
	/*$Personal=Personal::find(2);
	return $Personal::rol();*/
		
	/*return Personal::all()->user()->get();*/
	/*$personal=Personal::all();
	return $personal->user()->get();*/
/*	return DB::table('personal')
        ->leftJoin('users', 'personal.id', '=', 'users.personal_id')
        ->get();*/

	/*$users = Personal::with(array('user' => function($query)
	{
	    $query->where('users.personal_id', '!=', 'null');

	}))->get();
	return $users;*/
	/*$pers= Personal::all();
	return $pers->rightjoin('users','personal.id','=','users.personal_id')->first();*/
	/*$ordenes=Orden::with('platillos')->where('status','=','0')->first();
	print_r($ordenes->platillos);*/
	/*	$ordenes=Orden::with('platillos')->where('status','=','0')->get();
		return $ordenes;*/
	
	
	/*return Personal::doesntHave('user')->get();*/
	/*return Personal::doesntHave('user')->with('puesto')->get();*/
	/*$personal=Personal::with('puesto')->get();
	return $personal;*/
	/*$users=Personal::has('user')->with('user');
	return $users->with('Rol')->get();*/
	/*return User::has('personal')->with('personal','rol')->get();*/
	/*$pers=Personal::first();
	return $pers->getDates()->createdat;*/
	/*return Ingrediente::with('categoria')->get();*/
	/*return CategoriaIngrediente::with('ingredientes')->get();*/
	/*return Orden::with('platillos')->find(1);*/


	
	/*return Platillo::with('subcategoria.categoria')->get();*/
	/*return Personal::with('puesto')->get()->where('puesto.nombre','=','Mesero')->get();*/
	/*$posts = Personal::whereHas('puesto', function($q)
	{
	    $q->where('nombre', '=', 'Mesero');

	})->get();
	return $posts;*/
	/*return Venta::whereHas('ordenes', function($q)
		{
		    $q->where('status', '=', '1');

		})->with('ordenes')->get();;*/
	/*return Venta::has('ordenes')->get();*/
	/*return Orden::doesntHave('ventas')->where('status','=','1')->with('platillos','personal')->get();*/
	/*return Orden::find('1')->with('platillos')->get();*/
	return Venta::orderBy('id', 'desc')->with('ordenes.platillos')->first();


});
Route::get('wizard',function(){
	/*$ordenes=Orden::with('platillos')->where('status','=','')->get();
	return view('verOrdenestest',compact('ordenes'));*/
	return view('reportes.corteresumido');
});
