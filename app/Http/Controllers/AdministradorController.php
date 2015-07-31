<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\User;
use App\Models\Personal;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Puesto;
use Hash;
use Input;
use Auth;
use App\Models\Orden;
use App\Models\Venta;
use Carbon\Carbon;
use DB;
class AdministradorController extends Controller {

	public function __construct()
	{
		$this->middleware('administrador');
	}
	#Usuarios----------------------------------------------------------------------------------------
	public function getUsuarioregistrar(){
		$roles=Rol::all();
		return view('admin.registroprueba',compact('roles'));
	}
	public function getRegistrarusuario(){
		$roles=Rol::all();
		$personal=Personal::doesntHave('user')->get();
		return view('admin.registrousuario',compact('personal','roles'));

	}
	public function getListadoususario(){
		$users=User::has('personal')->with('rol')->get();
		return view('admin.listadousuarios',compact('users'));
	}
	public function getModificarusuario(){
		$users=User::has('personal')->with('personal','rol')->get();
		$roles=Rol::all();
		return view('admin.modificarusuarios',compact('users','roles'));

	}
	#Usuarios Fin----------------------------------------------------------------------------------------
	#Personal
	public function getRegistrarpersonal(){
		$puestos=Puesto::all();

		return view('admin.registropersonal',compact('puestos'));
	}
	
	
	public function getListadopersonal(){
		$personal=Personal::with('puesto')->get();
		return view('admin.listadopersonal',compact('personal'));

	}
	public function getModificarpersonal(){
		$puestos=Puesto::all();
		$personal=Personal::with('puesto')->get();
		return view('admin.modificarpersonal',compact('personal','puestos'));

	}
	#Personal Fin----------------------------------------------------------------------------------------

	# Reportes--------------------------------------------------------------------------------------
	public function getReporteshoy(){
		$today= Carbon::toDay()->toDateString();
		$ventas=Venta::where('fecha','=',$today)->count();
		$platillos=Orden::where(DB::raw('DATE(created_at)'), $today)->get()->sum('platillo_count');
		$ordenes=Orden::where(DB::raw('DATE(created_at)'), $today)->get()->count();
		$total=Orden::where(DB::raw('DATE(created_at)'), $today)->with('platillos')->get()->sum('platillo_total');
		return view('reportes.hoy',compact('ventas','platillos','ordenes','total'));
	}
	
	# Reportes Fin-----------------------------------------------------------------------------------
	
	
	public function postRegistrarusuario(Request $request){
		try{
			/*print_r(Input::all());*/
			/*$this->validate($request, [
				'optionSexo' => 'required',
				'optionUsu' => 'required',
			]);*/
			print_r(Input::all());
			/*$sexo=$request->get('optionSexo');
			$usu=$request->get('optionUsu');
			$sexoletra="";
			if($sexo=="1"){
				$sexoletra="M";
			}else{
				$sexoletra="F";
				
			}
			if($usu=="1"){
				
			}else{
				
			}*/
		/*$this->validate($request, [
			'nombre' => 'required|min:4|max:80',
			'apaterno' => 'required|min:4|max:80',
			'amaterno' => 'required|min:4|max:80',
			'fechanac' => 'required',
			'telefono' => 'numeric',
			'nombreusuario' => 'required|unique:users,username|min:4|max:80',
			'pass' => 'required|same:passconfirm',
			'passconfirm' => 'required|same:pass',
		]);
		try{
			
			$Personal=new Personal;
			$Personal->nombre=$request->get('nombre');
			$Personal->apaterno=$request->get('apaterno');
			$Personal->amaterno=$request->get('amaterno');
			$Personal->fechanac=$request->get('fechanac');
			$Personal->telefono=$request->get('telefono');
			$Personal->roles_id=$request->get('roles_id');
			$User=new User;
			$User->username=$request->get('nombreusuario');
			$User->password=Hash::make($request->get('pass'));
			$Personal->save();
			$Personal->User()->save($User);*/


			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);

		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
		#Reportes---------------------------------------------------------------------------------

		#Reportes Fin-----------------------------------------------------------------------------
		


	}
	public function getReportesano(){
		return view('reportes.porano');
	}
	public function getReporteplatillo(){
		return view('reportes.platillorango');

	}
	public function getReportepersonal(){
		return view('reportes.personalrango');

	}
	public function getCorteresumen(){
		return view('reportes.corteresumido');
	}
	


}
