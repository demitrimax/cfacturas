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


Route::group(['middleware'=>['auth','verified','activity']], function() {
  Route::resource('clientes', 'clientesController');
  Route::post('clientes/avatarchange', 'clientesController@avatar');
  Route::resource('datcontactos', 'datcontactoController');
  Route::resource('direcciones', 'direccionesController');
  Route::get('GetMunicipios/{id}', 'direccionesController@GetMunicipios');
  Route::get('GetCiudades','direccionesController@GetCiudades');
  Route::get('GetAsentamientos','direccionesController@GetAsentamientos');
  Route::resource('catdocumentos', 'catdocumentosController');
  Route::resource('catempresas', 'catempresasController');
  Route::post('catempresas/logochange', 'catempresasController@logotipo');
  Route::resource('empDatfiscales', 'emp_datfiscalesController');
  Route::resource('catBancos', 'cat_bancosController');
  Route::resource('catcuentas', 'catcuentasController');
  //Route::resource('usrs', 'usrsController');
  Route::resource('users', 'usersController');
  Route::get('profile','profileController@index');
  Route::post('profile/bio', 'profileController@storebio');
  Route::post('profile/password', 'profileController@password');
  Route::post('avatarchan', 'profileController@avatarchange');

  Route::resource('cattmovimientos', 'cattmovimientoController');
  Route::resource('mbancas', 'mbancaController');
  Route::post('catcuentas/agregarmov', 'catcuentasController@agregarmov');
  Route::resource('accomercials', 'accomercialController');
  Route::get('/accomercials/print/{id}', 'accomercialController@verprint');
  Route::get('/accomercials/pdf/{id}', 'accomercialController@verpdf');
  Route::get('/accomercials/autoriza1/{id}', 'accomercialController@autoriza1');
  Route::get('/accomercials/autoriza2/{id}', 'accomercialController@autoriza2');
  Route::get('accomercials/notificaralta/{id}', 'accomercialController@notificaralta');
  Route::get('accomercials/GetAjaxAcuerdo/{id}','accomercialController@GetAjaxAcuerdo');
  Route::get('GetDirecciones/{id}','accomercialController@GetDirecciones');
  Route::get('GetCuentas/{id}','accomercialController@GetCuentas');
  Route::get('GetComisiones/{id}','accomercialController@GetComisiones');


  Route::resource('roles','RoleController');
  Route::resource('user','UserController');
  Route::resource('permissions', 'PermissionController');

  Route::get('/solicitud', 'solicitudController@index')->name('solicitud');
  Route::post('/solicitud', 'solicitudController@store');
  Route::get('/solfactura', 'solicitudesController@create');


  Route::resource('solfact', 'solicitudesController');
  Route::get('/solfact/deleted/lista', 'solicitudesController@deleted');
  Route::post('/solfact/restaura', 'solicitudesController@restaura');
  Route::post('/solfact/asignar', 'solicitudesController@asignar');
  Route::get('solfact/InterEmpresa/print/{id}', 'solicitudesController@printInterEmpresa');
  Route::get('solfact/InterEmpresa/pdf/{id}', 'solicitudesController@InterEmpresaPDF');
  Route::get('/GetUmedida', 'solicitudesController@getUmedida');
  Route::get('/GetClaveps', 'solicitudesController@getClaveps');
  Route::post('/solfact/comprobante','solicitudesController@comprobantestore')->name('comprobante.store');

  Route::resource('pagocondicions', 'pagocondicionController');
  Route::resource('pagometodos', 'pagometodoController');
  Route::resource('facestatuses', 'facestatusController');

  Route::resource('facturas', 'facturasController');
  Route::get('facturas/GetAcuerdosCliente/{id}','facturasController@getAcuerdosCliente');
  Route::get('facturas/comprobante/{id}','facturasController@getComprobante');
  Route::get('facturas/createxml', 'facturasController@createXML');
  Route::get('facturas/GetEmpresasAcuerdo/{id}','facturasController@getEmpresasAcuerdo');

  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
  Route::resource('blogs', 'blogController');
  Route::resource('formapagos', 'formapagoController');
  Route::resource('usocfdis', 'usocfdiController');
  //RUTAS PARA SOCIOSCOMERCIALES
  Route::resource('sociocomercials', 'sociocomercialController');
  Route::post('sociocomercial/documento', 'sociocomercialController@guardaDocumento');
  Route::post('sociocomercial/cuenta', 'sociocomercialController@guardaCuenta');
  Route::post('sociocomercial/avatarchange', 'sociocomercialController@avatar');

  Route::resource('catgiroempresas', 'catgiroempresaController');
  Route::get('GetGiro','catgiroempresaController@GetGiros');

  Route::resource('asimilados', 'asimsalController');
  Route::post('asimilados/avatarchange', 'asimsalController@avatar');

  //ajax para dataTables
  Route::get("ajax/datatable-catbancos", 'cat_bancosController@ajaxcatbancos');
  //guardar facturas xml
  Route::post('facturaxml/save', 'facturasController@storeXML');
});
