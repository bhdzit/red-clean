<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\Prendas;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use PDF;
class VentasController extends Controller
{
    //
    public function getVentasView()
    {

        # code...
        return view("user.ventas", [
            "prendas" => Prendas::get(),
            "notas" => Notas::where("user_id", "=", Auth::id())
                ->get()
                ->append("items")
        ]);
    }

    public function guardarVenta(Request $request)
    {
        # code...
        $caja = User::getUltimaCaja();
        $notas = new Notas();
        $notas->nombre = $request->nombre;
        if (isset($request->domicilio)) $notas->domicilio = true;
        else $notas->domicilio = false;
        $notas->caja_id = $caja->caja;
        $notas->user_id = Auth::id();
        $notas->save();

        foreach ($request->input('item.*') as $i => $value) {
            $venta = new Ventas();
            $venta->nota_id = $notas->id;
            $venta->prenda_id = $request->input('item.*')[$i];
            $venta->cantidad = $request->input("cantidad.*")[$i];
            $precio = Prendas::find($request->input("item.*")[$i])->precio;
            $venta->total = $precio * $request->input("cantidad.*")[$i];
            $venta->save();
        }
        return redirect(route("ventas.index"));
    }

    public function getTicketPDF($id)
    {
        $data = [
            'titulo' => 'Styde.net'
        ];

        $data=Notas::find($id)
        ->append("items");
        
        $customPaper = array(0, 0, 667.00, 150);
        $pdf = PDF::loadView('layouts.dompdf', $data)->setPaper($customPaper, 'landscape');;
       
        return  $pdf->stream(); 
    }
}
