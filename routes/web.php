<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VistaController;


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

/*
Route::get('/productos', function () {
    return view('productos.index');
});

Route::get('/productos/create',[CreateController::class,'create']);
*/
Route::resource('productos',CreateController::class)->middleware('auth');


//panel de categorias
//Route::get('/categoria','CategoriaController@categoria')->name('categoria');


//Route::resource('/categoria', [CategoriaController::class, 'index'])->middleware('auth');
Route::resource('/categoria',CategoriaController::class)->middleware('auth');
Route::resource('/vista',VistaController::class);




Auth::routes();

Route::get('/', [InicioController::class, 'index'])->name('welcome');




Route::group(['middleware' => 'auth'], function(){
Route::get('/home', [CreateController::class, 'index'])->name('home');


});