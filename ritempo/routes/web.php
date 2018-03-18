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

/*Route::post('/contacto', function () {
    return view('contacto.contacto');
});*/



/*rutas accessibles slo si el usuario no se ha logueado*/
Route::resource('/','HomeController');
Route::get('show/{id}','ProductoCotController@show');
Route::get('subcategoria/{id}','SubcategoriaController@index');
Route::resource('contacto','ContactoController');
Route::resource('servicio','ServicioController');
Route::resource('producto-cot','ProductoCotController');
Route::resource('subcategoria','SubcategoriaController');
Route::resource('busqueda','BusquedaController');

Route::group(['middleware' => 'guest'], function () {

	Route::get('admin/login', 'Auth\LoginController@showLoginForm');
	Route::post('admin', ['as' =>'admin', 'uses' => 'Auth\LoginController@login']); 
    
	
});

//rutas accessibles solo si el usuario esta autenticado y ha ingresado al sistema
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
/*Route::get('register', 'Auth\RegisterController@showRegistrationForm'); */

Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);	
});


	Route::group(['middleware' => 'auth','namespace' => 'backend'], function () {

	Route::get('/admin', 'CategoriaController@index');
		
	/*Route::get('admin/home','CategoriaController@index');	*/
	/*Route::get('home', 'CategoriaController@index'); */
	

	Route::resource('admin/categoria','CategoriaController');
	Route::resource('admin/subcategoria','SubcategoriaController');
	Route::resource('admin/producto','ProductoController');
	Route::resource('admin/cotizacion','CotizacionController');
	// Registration routes...
	
});




/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
