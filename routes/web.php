<?php

use App\Http\Controllers\CajasController;
use App\Http\Controllers\EgresosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PrendasControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
use App\Models\Caja;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'verifyIsAdmin'], function () {
Route::get('/', function () {
    $ventas=Ventas::groupBy(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"))
    ->orderBy("created_at")
    ->select(DB::raw("count(created_at) as cantidad"),DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as fecha"))
    ->get();

    $ganacias=Ventas::groupBy(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"))
    ->orderBy("created_at")
    ->select(DB::raw("sum(total) as cantidad"),DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as fecha"))
    ->get();
    
    $productos=Ventas::leftJoin("prendas","prendas.id","=","prenda_id")
    ->groupBy("prenda_id")
    ->select("prenda_id","descripcion",DB::raw("count(prenda_id) as cantidad"),DB::raw("sum(total) as ganancias"))
    ->get();
    


    return view('dashboard',["ventasRealizadas"=>$ventas,
                            "ganacias"=>$ganacias,
                            "prendas"=>$productos]);
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    $ventas=Ventas::groupBy(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"))
    ->orderBy("created_at")
    ->select(DB::raw("count(created_at) as cantidad"),DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as fecha"))
    ->get();

    $ganacias=Ventas::groupBy(DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y')"))
    ->orderBy("created_at")
    ->select(DB::raw("sum(total) as cantidad"),DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as fecha"))
    ->get();
    
    $productos=Ventas::leftJoin("prendas","prendas.id","=","prenda_id")
    ->groupBy("prenda_id")
    ->select("prenda_id","descripcion",DB::raw("count(prenda_id) as cantidad"),DB::raw("sum(total) as ganancias"))
    ->get();
    


    return view('dashboard',["ventasRealizadas"=>$ventas,
                            "ganacias"=>$ganacias,
                            "prendas"=>$productos]);
})->middleware(['auth'])->name('dashboard');

Route::get('/prendas',[PrendasControler::class,"getPrendasView"] )->middleware(['auth'])->name('prendas.index');
Route::post('/guardarPrenda',[PrendasControler::class,"guardarPrenda"])->name("guardarPrenda");
Route::post('/editarPrenda',[PrendasControler::class,"editarPrenda"])->name("editarPrenda");
Route::post('/eliminarPrenda',[PrendasControler::class,"eliminarPrenda"])->middleware("auth")->name("eliminarPrenda");

Route::get('ingresos',[IngresosController::class,"getIngresosView"])->middleware(["auth"])->name("ingresos.index");
Route::post('/guardarIngresos',[IngresosController::class,"guardarIngresos"])->name("guardarIngresos");
Route::post('/editarIngresos',[IngresosController::class,"editarIngresos"])->name("editarIngresos");
Route::post('/eliminarIngresos',[IngresosController::class,"eliminarIngresos"])->middleware("auth")->name("eliminarIngresos");


Route::get('egresos',[EgresosController::class,"getEgresosView"])->middleware(["auth"])->name("egresos.index");
Route::post('/guardarEgreso',[EgresosController::class,"guardarEgresos"])->name("guardarEgreso");
Route::post('/editarEgreso',[EgresosController::class,"editarEgresos"])->name("editarEgreso");
Route::post('/eliminarEgreso',[EgresosController::class,"eliminarEgresos"])->middleware("auth")->name("eliminarEgreso");

Route::get('usuarios',[UserController::class,"getUsuariosView"])->middleware(["auth"])->name("usuarios.index");
Route::post('/guardarUsuario',[UserController::class,"guardarUsuario"])->name("guardarUsuario");
Route::post('/editarUsuario',[UserController::class,"editarUsuario"])->name("editarUsuario");
Route::post('/eliminarUsuario',[UserController::class,"eliminarUsuario"])->middleware("auth")->name("eliminarUsuario");
Route::get("cortes-caja",[CajasController::class,"getCajasView"])->name("caja.index");
Route::post("cerrar-caja",[CajasController::class,"cerrarCaja"])->name("cerrarCaja");
Route::get("imprimirCaja/{id}",[CajasController::class,"imprimirCaja"])->name("imprimirCaja");
});
//Rutas De Usuarios
Route::group(['middleware' => 'verifyIsUser'], function () {
Route::get('ventas',[VentasController::class,"getVentasView"])->name("ventas.index");
Route::get('imprimirTicket/{id}',[VentasController::class,"getTicketPDF"]);
Route::post('guardarVenta',[VentasController::class,"guardarVenta"])->name("guardarVenta");
});





require __DIR__.'/auth.php';
