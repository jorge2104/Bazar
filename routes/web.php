<?php

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

Route::get('/', 'indexController@index')->name('index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Productos', 'ProductosController');
Route::resource('Areas', 'AreasController')->middleware('auth');
Route::resource('Fotos', 'FotosController')->middleware('auth');
Route::resource('User', 'UserController');
Route::resource('Ventas', 'VentasController');

Route::post('/Areas/update/{id}', 'AreasController@update')
->middleware('auth')->name('Areas.actualizar');

Route::get('/Areas/destroy/{id}', 'AreasController@destroy')
->middleware('auth')->middleware('is_admin')->name('Areas.destroy');



Route::post('/Productos/update/{id}', 'productosController@update')
->middleware('auth')->name('Productos.actualizar');

Route::get('/Productos/destroy/{id}', 'ProductosController@destroy')
->middleware('auth')->name('Productos.destroy');


Route::get('/Fotos/destroy/{id}', 'FotosController@destroy')
->middleware('auth')->name('Fotos.destroy');

Route::post('/Fotos/update/{id}', 'fotosController@update')
->middleware('auth')->name('Fotos.actualizar');

Route::get('/Fotos/create/{id}', 'fotosController@create')
->middleware('auth')->name('Fotos.create');

Route::post('/Fotos/store/{id}', 'fotosController@store')
->middleware('auth')->name('Fotos.store');


Route::get('/Consignados/Index', 'ProductosController@consignados')
->middleware('auth')->name('Consigandos.index');

Route::get('/Consignados/create/{id}', 'ProductosController@consignadoCreate')
->middleware('auth')->name('Consigandos.create');

Route::get('/Consignados/delete/{id}', 'ProductosController@consignadoDelete')
->middleware('auth')->name('Consigandos.delete');

Route::get('/Consignados/stock/{id}', 'ProductosController@consignadoStock')
->middleware('auth')->name('Consigandos.stock');

Route::post('/Consignados/stock/{id}/store', 'ProductosController@consignadoStockStore')
->middleware('auth')->name('Consigandos.store');


Route::post('/user/edit/{id}/password', 'UserController@storePass')
->middleware('auth')->name('User.storePass');

Route::post('/User/Update/{id}/store', 'UserController@update')
->middleware('auth')->name('User.update');


Route::get('/Productos/admin/show', 'ProductosController@Aproductos')
->middleware('auth')->name('Aproductos.index');

Route::get('/Productos/admin/consignar/{id}', 'ProductosController@consignar')
->middleware('auth')->name('Productos.consignar');

Route::post('/Productos/admin/consignar/{id}/price', 'ProductosController@storeConsigna')
->middleware('auth')->name('Aproductos.consignar');

Route::get('/Productos/admin/consignar/{id}/delete', 'ProductosController@deleteConsigna')
->middleware('auth')->name('Productos.deleteConsigna');


Route::get('/compras', 'VentasController@compras')
->middleware('auth')->name('Compras.index');


Route::get('/Pagos/create/{id}', 'VentasController@createPago')
->middleware('auth')->name('Pagos.create');

Route::post('/Pagos/store/{id}', 'VentasController@storePago')
->middleware('auth')->name('Pagos.storePago');

Route::get('/Pagos/show/{id}', 'VentasController@PagoShow')
->middleware('auth')->name('Pagos.show');

Route::get('/compras/admin/show', 'VentasController@Aventas')
->middleware('auth')->name('Aventas.index');

Route::get('/Pagos/show/{id}/admin', 'VentasController@ApagoShow')
->middleware('auth')->name('Apagos.show');
