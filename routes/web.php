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
Route::get('/proveedores', 'ProveedoresController@index')->name('ProveedoresController@index');
Route::get('/proveedores/add', 'ProveedoresController@add')->name('ProveedoresController@add');
Route::post('/proveedores', 'ProveedoresController@backAdd')->name('ProveedoresController@backAdd');
Route::get('/proveedores/{id}/edit', 'ProveedoresController@edit')->name('ProveedoresController@edit');
Route::post('/proveedores/{id}', 'ProveedoresController@backEdit')->name('ProveedoresController@backEdit');
Route::delete('/proveedores/{id}/delete', 'ProveedoresController@delete')->name('ProveedoresController@delete');

// Categorias
Route::get('/categorias', 'CategoriasController@index')->name('CategoriasController@index');
Route::get('/categorias/add', 'CategoriasController@add')->name('CategoriasController@add');
Route::post('/categorias', 'CategoriasController@backAdd')->name('CategoriasController@backAdd');
Route::get('/categorias/{id}/edit', 'CategoriasController@edit')->name('CategoriasController@edit');
Route::post('/categorias/{id}', 'CategoriasController@backEdit')->name('CategoriasController@backEdit');
Route::delete('/categorias/{id}/delete', 'CategoriasController@delete')->name('CategoriasController@delete');

// Productos
Route::get('/productos', 'ProductosController@index')->name('ProductosController@index');
Route::post('/productos', 'ProductosController@productSearch')->name('ProductosController@productSearch');
Route::get('/productos/add', 'ProductosController@add')->name('ProductosController@add');
Route::post('/productos/backadd', 'ProductosController@backAdd')->name('ProductosController@backAdd');
Route::get('/productos/{id}/edit', 'ProductosController@edit')->name('ProductosController@edit');
Route::delete('/productos/{id}/delete', 'ProductosController@delete')->name('ProductosController@delete');
Route::post('/productos/{id}', 'ProductosController@backEdit')->name('ProductosController@backEdit');
Route::get('/productos/alta/ver', 'ProductosController@addStock')->name('ProductosController@addStock');
Route::post('/productos/alta/ver', 'ProductosController@backStock')->name('ProductosController@backStock');
Route::get('/productos/informe/ver', 'ProductosController@viewStock')->name('ProductosController@viewStock');
