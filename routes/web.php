<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\MovimientosController;



Route::get('/', function () {
    return view('welcome');
});
//sdmsndk
Route::resource('productos', ProductoController::class)->middleware('auth');
Route::resource('/categoria', CategoriaController::class)->middleware('auth');
Route::resource('/tipo', TipoController::class)->middleware('auth');
Route::resource('/empresa', EmpresaController::class)->middleware('auth');
Route::resource('/footer', FooterController::class)->middleware('auth');
Route::resource('/bodega', BodegaController::class)->middleware('auth');
Route::resource('/movimientos', MovimientosController::class)->middleware('auth');
Route::post('/bodega/stock/agregar', [MovimientosController::class, 'sumaStock'])->name('sumar.stock');
Route::post('/bodega/stock/salida', [MovimientosController::class, 'salidaStock'])->name('salida.stock');





Auth::routes();
Route::get('/', [InicioController::class, 'index'])->name('welcome');
Route::get('/empresa-vista', [EmpresaController::class, 'empresa'])->name('productos.empresa-vista');
Route::get('category/{categoria}', [InicioController::class, 'categoria'])->name('productos.category');
Route::get('tipo-vista/{tipo}', [InicioController::class, 'tipo'])->name('productos.tipo-vista');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [ProductoController::class, 'index'])->name('home');
});
