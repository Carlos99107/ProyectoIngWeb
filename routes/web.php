<?php

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
    return view('welcome2');
});

Route::resource('cliente','App\Http\Controllers\ClienteController');
Route::resource('user','App\Http\Controllers\UserController');
Route::resource('plato','App\Http\Controllers\PlatosController');
Route::resource('orden','App\Http\Controllers\OrdenController');
Route::resource('factura','App\Http\Controllers\FacturaController');
Route::get('/ventas','App\Http\Controllers\FacturaController@ventas');
Route::post('/filterdate','App\Http\Controllers\FacturaController@filterdate');
Route::get('/mejores','App\Http\Controllers\OrdenController@mejores');
Route::post('/filterplate','App\Http\Controllers\OrdenController@filterplate');
Route::get('/mejoresClientes','App\Http\Controllers\OrdenController@mejoresClientes');
Route::post('/filterclient','App\Http\Controllers\OrdenController@filterclient');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');


Route::get('/registerUser', 'App\Http\Controllers\UserController@registerUser')->name('registerUser');



