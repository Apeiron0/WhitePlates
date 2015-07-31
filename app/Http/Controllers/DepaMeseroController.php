<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Platillo;
use App\Models\Personal;
use App\Models\Orden;
use Illuminate\Http\Request;

class DepaMeseroController extends Controller {
	public function __construct()
	{
		$this->middleware('encargadomeseros');
	}

	public function getRegistrar(){
		$platillos= Platillo::with('subcategoria.categoria')->get();
		$personal = Personal::whereHas('puesto', function($q)
		{
		    $q->where('nombre', '=', 'Mesero');

		})->get();
		return  view('depamesero.nuevaOrden',compact('platillos','personal'));
	}
	public function postRegistrarorden(Request $request){
		$this->validate($request, [
			'comentario' => 'min:04',
		]);
		$orden=new Orden;
		$orden->comentarios=$request->get('comentarios');
		$orden->idpersonal=$request->get('id_personal');
		$orden->save();
		try{
			
			foreach($request->get('platillos') as $platillo){
				$orden->platillos()->attach($platillo['idplatillo'],array('cantidad'=>$platillo['cantidad'],'total'=>$platillo['total']));
			}
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
		
	}

}
