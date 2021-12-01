<?php

namespace App\Http\Controllers;

use App\Models\Prendas;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrendasControler extends Controller
{
    public function getPrendasView(){
        
        return view("admin.prendas",["arregloDeprendas"=>Prendas::get()]);
    }
    public function eliminarPrenda(Request $request){

        DB::table('ventas')->where('prenda_id', '=', $request->idPrenda)->delete();
        
        Prendas::destroy($request->idPrenda);
        return redirect(route("prendas.index"));
    }
    public function guardarPrenda(Request $request){
        $prenda=new Prendas();
        $prenda->descripcion=$request->descripcion;
        $prenda->precio=$request->precio;
        $prenda->save();
        return redirect(route("prendas.index"));
    }

    public function editarPrenda(Request $request){
       
        $prenda=Prendas::find($request->id);
        $prenda->descripcion=$request->descripcion;
        $prenda->precio=$request->precio;
        $prenda->save();
        return redirect(route("prendas.index"));
    }
}
