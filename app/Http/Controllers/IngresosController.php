<?php

namespace App\Http\Controllers;

use App\Models\Ingresos;
use Illuminate\Http\Request;

class IngresosController extends Controller
{
    public function getIngresosView(){
        return view("admin.ingresos",["ingresos"=>Ingresos::get()]);
    }

    public function guardarIngresos(Request $request){
        $ingreso= new Ingresos();
        $ingreso->descripcion=$request->descripcion;
        $ingreso->cantidad=$request->cantidad;
        $ingreso->save();
        return redirect(route("ingresos.index"));
    }

    public function eliminarIngresos(Request $request){
        
        Ingresos::destroy($request->idIngresos);
        return redirect(route("ingresos.index"));
    }

    public function editarIngresos(Request $request){
        $ingreso= Ingresos::find($request->idIngreso);
        $ingreso->descripcion=$request->descripcion;
        $ingreso->cantidad=$request->cantidad;
        $ingreso->save();
        return redirect(route("ingresos.index"));
    }

  
}
