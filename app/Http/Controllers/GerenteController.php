<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CategoriaIngrediente;
use App\Models\Ingrediente;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Platillo;
use Illuminate\Http\Request;

class GerenteController extends Controller {
	public function __construct()
	{
		$this->middleware('gerente');
	}
	#Platillos--------------------------------------------------------------------------------------
	public function postRegistrarplatillo(Request $request){
		$this->validate($request, [
			'nombre' => 'required|unique:platillos,nombre|min:01|max:70',
			'precio'=>'required|numeric',
			'idsubcategoria'=>'exists:subcategorias,id',
			'descripcion'=>'min:04',
			
		]);
		try{
			$select= $request->get('my_multi_select2');
			
			$platillo=new Platillo;
			$platillo->precio=$request->get('precio');
			$platillo->nombre=$request->get('nombre');
			$platillo->idsubcategoria=$request->get('id_subcategoria');
			$platillo->descripcion=$request->get('descripcion');
			$platillo->save();
			foreach($select as $sele){
				$platillo->ingredientes()->attach($sele);
			}
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}

	}
	
	public function getRegistrarplatillo(){
		$categorias= CategoriaIngrediente::with('ingredientes')->get();
		$categoriasplatillos=Categoria::all();
		$subcategorias=SubCategoria::all();
		return view('gerente.registroplatillos',compact('categorias','categoriasplatillos','subcategorias'));
	}
	#Fin platillos------------------------------------------------------------------------
	

	

	
	public function postTraersubcategorias(Request $request){
		try{
			$subs= SubCategoria::where('idcategoria','=',($request->get('id')))->get();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"SubCategorias"=>$subs);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
	}
	
	
	public function getIngredienteslistado(){
		$ingredientes= Ingrediente::with('categoria')->get();
		return view('gerente.listadoingredentes',compact('ingredientes'));

	}

	public function getIngredienteregistro(){
		$categorias=CategoriaIngrediente::all();
		return view('gerente.registroingrediente',compact('categorias'));

	}
	
	public function getModificaringrediente(){
		$ingredientes= Ingrediente::with('categoria')->get();
		$categorias=CategoriaIngrediente::all();
		return view('gerente.modificaringrediente',compact('ingredientes','categorias'));

	}
	
	public function postRegistraringrediente(Request $request){
		$this->validate($request, [
			'nombre' => 'required|unique:ingredientes,nombre|min:01|max:70',
			'idcategoriaingrediente'=>'exists:categoriasingredientes,id',
			
		]);
		try{
			$Ingrediente=new Ingrediente;
			$Ingrediente->nombre=$request->get('nombre');
			$Ingrediente->idcategoriaingrediente=$request->get('idcategoriaingrediente');
			$Ingrediente->save();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}


	}
	//Categoria ingrediente inicio
	public function getCategoriaregistro(){
		return view('gerente.registrocategoriaingrediente');
	}
	public function postCountcategoria(Request $request){
		$Disponible=true;
		$count=CategoriaIngrediente::where('nombre','=',$request->only('nombre'))->count();
		if($count > 0)
		{
			$Disponible=false;
		}
		
		return (array('valid'=>$Disponible)) ;

	}
	public function postRegistrocategoria(Request $request){
		$this->validate($request, [
			'nombre' => 'required|unique:categoriasingredientes,nombre|min:01|max:80',
		]);
		try{
			$categoria=new CategoriaIngrediente;
			$categoria->nombre=$request->get('nombre');
			$categoria->save();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
	}

	public function getIngredientescategoriamodificar(){
		$categorias=CategoriaIngrediente::all();
		return view('gerente.modificarcategoria',compact('categorias'));

	}
	public function postModificarcategoriaingredi(Request $request){
		$this->validate($request, [
			'nombre' => 'required|unique:categoriasingredientes,nombre|min:01|max:80',
			'categoria_id'=>'required',
		]);
		try{
			$categoria= CategoriaIngrediente::find($request->get('categoria_id'));
			$categoria->nombre=$request->get('nombre');
			$categoria->save();
			$categorias=CategoriaIngrediente::all();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"Categorias"=>$categorias);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
	}
	public function getCategoriaslistado(){
		$categorias=CategoriaIngrediente::all();
		return view('gerente.listadocategoriasngredinentes',compact('categorias'));
	}
	//Fin categorias ingredientes--------------------------------------------------------------
	public function postModificaringrediente(Request $request){
		$ban=false;
		if($request->get('nombre')!=$request->get('nombre')){
			$ban=true;
			$this->validate($request, [
				'ingrediente_id'=>'required|exists:ingredientes,id',
				'nombre' => 'required|unique:categoriasingredientes,nombre|min:01|max:80',
				'categoria_id'=>'required',
			]);
		}else{
			$ban=false;
			$this->validate($request, [
				'ingrediente_id'=>'required|exists:ingredientes,id',
				'categoria_id'=>'required',
			]);

		}
		try{
			$ingrediente= Ingrediente::find($request->get('ingrediente_id'));
			
			if($request->get('nombre')!="")
				$ingrediente->nombre=$request->get('nombre');
			$ingrediente->idcategoriaingrediente=$request->get('categoria_id');
			$ingrediente->save();
			$ingredientes= Ingrediente::with('categoria')->get();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"Ingredientes"=>$ingredientes);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}
	}
	
	//Platillos
	public function postCountingrediente(Request $request){
		$Disponible=true;
		$count=Ingrediente::where('nombre','=',$request->only('nombre'))->count();
		if($count > 0)
		{
			$Disponible=false;
		}
		
		return (array('valid'=>$Disponible)) ;
	}
	public function postCountplatillo(Request $request){
		$Disponible=true;
		$count=Platillo::where('nombre','=',$request->only('nombre'))->count();
		if($count > 0)
		{
			$Disponible=false;
		}
		
		return (array('valid'=>$Disponible)) ;
	}
	public function getPlatilloslistado(){
		$platillos= Platillo::with('subcategoria.categoria')->get();
		return view('gerente.listadoplatillos',compact('platillos'));

	}
	public function postIngredientes(Request $datos){
		$ingredientes = Platillo::where('id','=',$datos['id'])->with('ingredientes')->get();
		return $ingredientes;
	}
	//Fin Platillos-----------------------------------------------------------------------------

	//Sub-Categorias---------------------------------------------------------------------
	public function getRegistroubcategoria(){
		$categorias=Categoria::all();
		return view('admin.registrosubcategorias',compact('categorias'));
	}
	public function postSubcategorianombre(Request $request){
		$Disponible=true;
		$count=SubCategoria::where('nombre','=',$request->only('nombre'))->count();
		if($count > 0)
		{
			$Disponible=false;
		}
		
		return (array('valid'=>$Disponible)) ;
	}
	public function postRegistrarsubcategoria(Request $request){
		$this->validate($request, [
			'nombre' => 'required|unique:subcategorias,nombre|min:01|max:80',
			'idcategoria'=>'exists:categorias,id',
			
		]);
		try{
			$SubCategoria=new SubCategoria;
			$SubCategoria->nombre=$request->get('nombre');
			$SubCategoria->idcategoria=$request->get('idcategoria');
			$SubCategoria->save();
			return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
		}catch(Exception $e){
			return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
		}


	}
	//Sub-Categorias End---------------------------------------------------------------------

}
