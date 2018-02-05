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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/carrito', 'CarritosController@index')->name('carrito')->middleware('auth');

Route::get('/carrito/pago', 'CarritosController@pagar')->middleware('auth');

Route::resource('tiendas', 'TiendasController',['middleware' => ['auth']]);

Route::resource('productos','ProductosController',['middleware' => ['auth']]);

Route::resource('cp','ProductosCarritosController',['middleware' => ['auth']]);

Route::resource('comentarios','ComentariosController',['middleware' => ['auth']]);

Route::resource('preguntas','PreguntasController',['middleware' => ['auth']]);

Route::get('/pagos','PagosController@store')->middleware('auth');

Route::post('procesarpago','PagosController@procesarpago')->middleware('auth');

Route::post('busqueda','HomeController@busqueda')->middleware('auth');

Route::resource('compras','CarritosController',[
	'only' => ['show'],
	'middleware' => ['auth'],
]);

Route::resource('ordenes','OrdenesController',['middleware' => ['auth']]);

Route::get('productos/images/{filename}',function($filename){
	// nos ubicamos en la ruta storage
	$path = storage_path("app/images/$filename");
	
	if (!\File::exists($path)){
		abort(404);
	}
	
	$file = \File::get($path);
	$type = \File::mimeType($path);
	$response = Response::make($file,200);
	$response->header("Content-Type", $type);

	return $response;
});
