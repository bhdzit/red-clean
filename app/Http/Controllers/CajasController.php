<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CajasController extends Controller
{
    //
    public function getCajasView()
    {        

   

        return view("admin.corte-cajas",["cajas"=>Caja::leftJoin("notas","cajas.id","=","caja_id")
        ->leftJoin("ventas","nota_id","=","notas.id")
        ->leftJoin("users","cajas.user_id","=","users.id")
        ->select("cajas.id","cajas.status","users.name",DB::raw("count(prenda_id) as numeroDePrendas"),DB::raw("sum(total) as totalDeNota"),"cajas.caja")
        ->groupBy("cajas.id")
        ->get()]);
    }

    public function cerrarCaja(Request $request)
    {
        # code...
        $caja=Caja::find($request->idCaja);
        $caja->status=true;
        $caja->save();
        Caja::create([
            "caja"=>($caja->caja+1),
            "status"=>false,
            "user_id"=>$caja->user_id

        ]);
        return redirect(route("caja.index"));
    }
}
