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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index');

Route::resource('clientes', 'clientesController');

Route::resource('datcontactos', 'datcontactoController');

Route::resource('direcciones', 'direccionesController');

Route::get('GetMunicipios/{id}', 'direccionesController@GetMunicipios');

Route::resource('catdocumentos', 'catdocumentosController');

Route::post('clientes/avatarchange', 'clientesController@avatar');


Route::resource('catempresas', 'catempresasController');

Route::resource('empDatfiscales', 'emp_datfiscalesController');

Route::resource('catBancos', 'cat_bancosController');

Route::resource('catcuentas', 'catcuentasController');