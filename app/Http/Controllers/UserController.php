<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function getUsuariosView(){
        
        return view("admin.usuarios",["usuarios"=>User::get()]);
    }
    public function eliminarUsuario(Request $request){
        User::destroy($request->idUsuario);
        return redirect(route("usuarios.index"));
    }
    public function guardarUsuario(Request $request){
       # return $request;
        $usuarios=new User();
        $usuarios->name=$request->name;
        $usuarios->email=$request->email;
        $usuarios->tipo=$request->tipo;
        $usuarios->password=Hash::make($request->password);
        $usuarios->save();
        return redirect(route("usuarios.index"));
    }

    public function editarUsuario(Request $request){
        $usuarios=User::find($request->id);
        $usuarios->name=$request->name;
        $usuarios->email=$request->email;
        $usuarios->tipo=$request->tipo;
        if(isset($request->password))
        $usuarios->password=Hash::make($request->password);
        $usuarios->save();
        return redirect(route("usuarios.index"));
    }
}
