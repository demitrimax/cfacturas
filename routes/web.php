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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/privacidad', function() {
    return view('users.terminosycondiciones');
});


Route::group(['middleware'=>['auth','verified']], function() {
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
  //Route::resource('usrs', 'usrsController');
  Route::resource('users', 'usersController');
  Route::get('profile','profileController@index');
  Route::post('avatarchan', 'profileController@avatarchange');
  Route::resource('cattmovimientos', 'cattmovimientoController');
  Route::resource('mbancas', 'mbancaController');
  Route::post('catcuentas/agregarmov', 'catcuentasController@agregarmov');
  Route::resource('accomercials', 'accomercialController');
  Route::get('/accomercials/print/{id}', 'accomercialController@verprint');
  Route::get('/accomercials/pdf/{id}', 'accomercialController@verpdf');
  Route::get('accomercials/notificaralta/{id}', 'accomercialController@notificaralta');
  Route::get('GetDirecciones/{id}','accomercialController@GetDirecciones');
  Route::get('GetCuentas/{id}','accomercialController@GetCuentas');


  Route::resource('roles','RoleController');
  Route::resource('user','UserController');
  Route::resource('permissions', 'PermissionController');

  Route::get('/solicitud', 'solicitudController@index')->name('solicitud');
  Route::post('/solicitud', 'solicitudController@store');
  Route::get('/solfactura', 'solicitudController@solfactura');


  Route::resource('solfact', 'solicitudesController');
  Route::get('/solfact/deleted/lista', 'solicitudesController@deleted');
  Route::post('/solfact/restaura', 'solicitudesController@restaura');
  Route::post('/solfac/asignar', 'solicitudesController@asignar');

  Route::resource('pagocondicions', 'pagocondicionController');
  Route::resource('pagometodos', 'pagometodoController');
  Route::resource('facestatuses', 'facestatusController');
});
