<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Platillo;
use Illuminate\Http\Request;

class CocinaController extends Controller {
	public function __construct()
	{
		$this->middleware('cocina');
	}
	public function getTable(){
		
		return view('cocina.asignarOrden');
	}
	public function getVer(){
		$ordenes=Orden::with('platillos')->where('status','=','0')->get();
		return view('cocina.verOrdenes', compact('ordenes'));
	}
	public function postPlatillos(Request $request){
		$platillos = Orden::where('id','=',$request['id'])->with('platillos')->get();
		return $platillos;
	}
	public function postIngredientes(Request $datos){
		$ingredientes = Platillo::where('id','=',$datos['id'])->with('ingredientes')->get();
		return $ingredientes;
	}
	public function postCambiarestado(Request $datos){
		try {
			$orden = Orden::find($datos['id']);
			$orden->status = 1;
			$orden->save();
			$ordenes=Orden::with('platillos')->where('status','=','0')->get();
			return array("Msg" => "Status de orden cambiado", "Codigo" => "01", "Bandera" => true,"Orden"=>$ordenes);
		} catch (Exception $e) {
			return array("Msg" => $e->getMessage(), "Codigo" => $e->getCode(), "Bandera" => false);
		}
	}
	public function postOrdenes(){
		$ordenes=Orden::with('platillos')->where('status','=','0')->get();
		return $ordenes;
	}
	

}