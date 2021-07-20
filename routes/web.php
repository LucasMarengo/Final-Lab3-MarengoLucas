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
    return view('index');
});
// Proveedores
Route::get('/proveedores', 'ProveedoresController@list')->name('ProveedoresController@list');
Route::get('/proveedores/add', 'ProveedoresController@add')->name('ProveedoresController@add');
Route::post('/proveedores', 'ProveedoresController@backAdd')->name('ProveedoresController@backAdd');
