<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prendas',[PrendasControler::class,"getPrendasView"] )->middleware(['auth'])->name('prendas.index');
Route::post('/eliminarPrenda',[PrendasControler::class,"eliminarPrenda"])->middleware("auth")->name("eliminarPrenda");
require __DIR__.'/auth.php';
