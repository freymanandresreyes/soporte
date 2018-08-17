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

// ************************************************************************************
  // RUTAS PARA LAS AREAS
// ***************************************************************************************
  Route::get('areas', 'AreasController@areas')->name('areas');
  Route::get('crear_area', 'AreasController@crear_area')->name('crear_area');
  Route::get('editar_area', 'AreasController@editar_area')->name('editar_area');
  Route::get('guardar_editar', 'AreasController@guardar_editar')->name('guardar_editar');
  Route::get('buscar_area_lider', 'AreasController@buscar_area_lider')->name('buscar_area_lider');
  Route::get('quitar_area', 'AreasController@quitar_area')->name('quitar_area');


// ********************************************************************************************
  // RUTAS PARA LOS ESTADOS
// **********************************************************************************************
Route::get('nuevo_estado', 'EstadosController@nuevo_estado')->name('nuevo_estado');
Route::get('listar_estados', 'EstadosController@listar_estados')->name('listar_estados');
Route::get('llenar_input', 'EstadosController@llenar_input')->name('llenar_input');
Route::get('guardar_editar_estado', 'EstadosController@guardar_editar_estado')->name('guardar_editar_estado');


// ********************************************************************************************
  // RUTAS PARA LA VISTA DE GENERAR UNA ORDEN
// **********************************************************************************************
Route::get('vista_generar', 'OrdenesController@vista_generar')->name('vista_generar');
});
