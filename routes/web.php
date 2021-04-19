<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;

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
Route::resource('productos',CreateController::class);