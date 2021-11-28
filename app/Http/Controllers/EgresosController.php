<?php

namespace App\Http\Controllers;

use App\Models\Egresos;
use Illuminate\Http\Request;

class EgresosController extends Controller
{
    public function getEgresosView(){
        return view("admin.egresos",["egresos"=>Egresos::get()]);
    }

    public function guardarEgresos(Request $request){
        $ingreso= new Egresos();
        $ingreso->descripcion=$request->descripcion;
        $ingreso->cantidad=$request->cantidad;
        $ingreso->save();
        return redirect(route("egresos.index"));
    }

    public function eliminarEgresos(Request $request){
        Egresos::destroy($request->idEgreso);
        return redirect(route("egresos.index"));
    }

    public function editaregresos(Request $request){
        $ingreso= Egresos::find($request->idEgreso);
        $ingreso->descripcion=$request->descripcion;
        $ingreso->cantidad=$request->cantidad;
        $ingreso->save();
        return redirect(route("egresos.index"));
    }
}
