<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CategoriaController;


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

Route::resource('productos', CreateController::class)->middleware('auth');
Route::resource('/categoria', CategoriaController::class)->middleware('auth');
Route::resource('/empresa', EmpresaController::class)->middleware('auth');
Auth::routes();
Route::get('/', [InicioController::class, 'index'])->name('welcome');
Route::get('/empresa-vista', [EmpresaController::class, 'empresa'])->name('welcome');
Route::get('category/{categoria}', [InicioController::class, 'categoria'])->name('productos.category');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [CreateController::class, 'index'])->name('home');
});
