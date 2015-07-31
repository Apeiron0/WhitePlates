<?php namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Personal;
class PersonalController extends Controller {
  public function postRegistrarpersonal(Request $request){
    try{
       $this->validate($request, [
      'nombre' => 'required|min:3|max:80',
      'apaterno' => 'required|min:3|max:80',
      'amaterno' => 'required|min:3|max:80',
      'fechanac' => 'required',
      'telefono' => 'required|min:7|max:35',
      'sexo'=>'required',
      'puesto_id'=>'required|exists:puestos,id',
    ]);
      Personal::create($request->only('nombre','apaterno','amaterno','fechanac','telefono','sexo','puesto_id'));
      return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true);
    }catch(Exception $e){
      return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
    }


  }
   public function postModifcarpersonal(Request $request){
    try{
       $this->validate($request, [
      'nombre' => 'required|min:3|max:80',
      'apaterno' => 'required|min:3|max:80',
      'amaterno' => 'required|min:3|max:80',
      'fechanac' => 'required',
      'telefono' => 'required|min:7|max:35',
      'sexo'=>'required',
      'puesto_id'=>'required|exists:puestos,id',
    ]);
      $persona=Personal::find($request->get('personal_id'));
      $persona->nombre=$request->get('nombre');
      $persona->apaterno=$request->get('apaterno');
      $persona->amaterno=$request->get('amaterno');
      $persona->telefono=$request->get('telefono');
      $persona->fechanac=$request->get('fechanac');
      $persona->sexo=$request->get('sexo');
      $persona->puesto_id=$request->get('puesto_id');
      $persona->save();
      $personal=Personal::with('puesto')->get();
      return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"Personal"=>$personal);
    }catch(Exception $e){
      return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
    }


  }

}

?>