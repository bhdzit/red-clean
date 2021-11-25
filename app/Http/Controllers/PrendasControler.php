<?php

namespace App\Http\Controllers;

use App\Models\Prendas;
use Illuminate\Http\Request;

class PrendasControler extends Controller
{
    public function getPrendasView(){
        
        return view("admin.prendas",["arregloDeprendas"=>Prendas::get()]);
    }
    public function eliminarPrenda(Request $request){
       
        Prendas::destroy($request->idPrenda);
        return redirect(route("prendas.index"));
    }
}
