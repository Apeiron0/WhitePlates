<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Platillo;
use App\Models\Orden;
use Illuminate\Http\Request;
use Auth;

class MeseroController extends Controller {
	public function __construct()
	{
		$this->middleware('mesero');
	}
	public function getRegistrar(){
		$platillos= Platillo::with('subcategoria.categoria')->get();
		return  view('mesero.nuevaOrden',compact('platillos'));
	}
	public function postRegistrarorden(Request $request){
		try{
			$orden=new Orden;
			$orden->comentarios=$request->get('comentarios');
			$orden->idpersonal=Auth::user()->personal->id;
			$orden->save();
			foreach($request->get('platillos') as $platillo){
				$orden->platillos()->attach($platillo['idplatillo'],array('cantidad'=>$platillo['cantidad'],'total'=>$platillo['total']));
			}
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
		
	}

}
