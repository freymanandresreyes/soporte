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
// Registration Routes...
 //rutas en caso de perdida del usuario administrador
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');
// Route::post('crear_usuario', 'UsuariosController@crear_usuario');//descomentar en caso de perdida de usuario

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  // Route::get('/', function () {
  //     return view('caja.registradora');
  // });

 Route::get('/', function () {
     return view('layout');
  });




//   Route::get('/', function () {
//     $consulta = App\configuraciones::find(1);
//     $json = $consulta->lista_tag;
//     dd(json_decode($json, true));
//  });


  Route::get('/home', 'HomeController@index');
  Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
  Route::post('crear_usuario', 'UsuariosController@crear_usuario');
  Route::post('editar_usuario', 'UsuariosController@editar_usuario');
  Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
  Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
  Route::post('editar_acceso', 'UsuariosController@editar_acceso');


  Route::post('crear_rol', 'UsuariosController@crear_rol');
  Route::post('crear_permiso', 'UsuariosController@crear_permiso');
  Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
  Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');


  Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
  Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
  Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
  Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
  Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
  Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
  Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
  Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
  Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');

  // Registration Routes...
  $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');

  // Password Reset Routes...
  $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  $this->post('password/reset', 'Auth\ResetPasswordController@reset');
  /* ======================================================================*/
  /* ======================= NUEVAS RUTAS =================================*/
  /* ======================================================================*/


// ********************************************************************************************
  // RUTAS PARA LA VISTA DE COLABORADORES
// **********************************************************************************************
Route::get('colaboradores','ColaboradoresController@colaboradores')->name('colaboradores');
Route::get('buscar_colaborador','ColaboradoresController@buscar_colaborador')->name('buscar_colaborador');
Route::get('crear_colaborador','ColaboradoresController@crear_colaborador')->name('crear_colaborador');
Route::get('agregar_area_colaborador','ColaboradoresController@agregar_area_colaborador')->name('agregar_area_colaborador');
Route::get('estado_colaborador','ColaboradoresController@estado_colaborador')->name('estado_colaborador');

// ********************************************************************************************
  // RUTAS PARA LA VISTA DE ORDENES
// **********************************************************************************************
Route::get('ordenes','OrdenesController@index')->name('ordenes.index');
Route::get('guardar_orden','OrdenesController@guardar_orden')->name('guardar_orden.index');

// ********************************************************************************************
  // RUTAS PARA LA VISTA DE DESIGNADOS
// **********************************************************************************************
Route::get('designados','DesignadosController@designados')->name('designados');

// ********************************************************************************************
  // RUTAS PARA LA VISTA DE ACEPTAR REQUERIMIENTO
// **********************************************************************************************
Route::get('aceptar_requerimiento','AceptarRequerimientoController@aceptar_requerimiento')->name('aceptar_requerimiento');
Route::get('ver_orden','AceptarRequerimientoController@ver_orden')->name('ver_orden');
});
