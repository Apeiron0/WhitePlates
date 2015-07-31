<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Personal;
use Hash;
class UserController extends Controller {
    public function postNomusuario(Request $request){
      $Disponible=true;
      $count=User::where('username','=',$request->only('username'))->count();
      if($count > 0)
      {
        $Disponible=false;
      }
      
      return (array('valid'=>$Disponible)) ;
    }

    public function postRegistrar(Request $request){
      try{
        $this->validate($request, [
          'username' => 'required|unique:users,username|min:4|max:80',
          'password' => 'required|same:password2',
          'password2' => 'required|same:password',
          'roles_id'=>'required|exists:roles,id',
          'personal_id'=>'required|exists:personal,id',
        ]);
        $user=new User;
        
        $user->username=$request->get('username');
        $user->password=Hash::make($request->get('password'));
        $user->roles_id=$request->get('roles_id');
        $user->personal_id=$request->get('personal_id');
        $user->save();
        $personal=Personal::doesntHave('user')->with('puesto')->get();
        return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"Personal"=>$personal);
      }
      catch(Exception $e){
        return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
      }
    }
    public function postModificar(Request $request){
      try{
        
        if($request->get('password')==""){
          $this->validate($request, [
          'user_id'=>'required',
          'roles_id'=>'required|exists:roles,id',
          'active'=>'required'
        ]);

        }else{
          $this->validate($request, [
          'user_id'=>'required',
          'password' => 'required|same:password2',
          'password2' => 'required|same:password',
          'roles_id'=>'required|exists:roles,id',
          'active'=>'required'
        ]);
        }
        
        $user=User::find($request->get('user_id'));
        if($request->get('password')!="")
          $user->password=Hash::make($request->get('password'));
        $user->roles_id=$request->get('roles_id');
        $user->active=$request->get('active');
        $user->save();
        $users=User::has('personal')->with('personal','rol')->get();
        $nombre=Auth::user()->username;
        return array("Msg" =>"Registro Exitoso","Codigo"=>"01","Bandera"=>true,"Users"=>$users,"Nombre"=>$nombre);
      }
    catch(Exception $e){
      return array("Msg" =>$e->getMessage(),"Codigo"=>$e->getCode(),"Bandera"=>false);
    }
  }

}
?>