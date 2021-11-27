<?php

use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PrendasControler;
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


require __DIR__.'/auth.php';
