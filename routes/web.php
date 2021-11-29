<?php

use App\Http\Controllers\CajasController;
use App\Http\Controllers\EgresosController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PrendasControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentasController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
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

//Rutas De Usuarios

Route::get('ventas',[VentasController::class,"getVentasView"])->name("ventas.index");
Route::get('imprimirTicket/{id}',[VentasController::class,"getTicketPDF"]);
Route::post('guardarVenta',[VentasController::class,"guardarVenta"])->name("guardarVenta");

Route::get("corte-caja",[CajasController::class,"getCajasView"]);





require __DIR__.'/auth.php';
