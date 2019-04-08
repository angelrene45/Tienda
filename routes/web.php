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

Auth::routes();


Route::get('/', 'InicioController@inicio');


Route::name('inicio')->get('inicio/inicio','InicioController@inicio');

//Ruta para realizar pdf
Route::name('producto.pdf')->get('archivo/{id}/pdf','InicioController@pdf');

Route::name('producto.descripcion')->get('principal/{id}/{slug}','InicioController@descripcion');

Route::name('producto.busqueda')->get('inicio/busqueda/','InicioController@busqueda');



//RUTAS DEL PANEL DE ADMINISTRACIÓN
Route::group(['middleware' => 'admin'],function() //RUTAS PROTEGIDAS PARA USUARIOS ADMIN
{
	Route::get('/home', 'HomeController@index')->name('home');

	Route::name('admin_inicio')->get('admin/inicio','AdminController@inicio');

	//CRUD EN PRODUCTOS
	Route::resource('products','ProductoController');
	Route::get('product/{id}/destroy' , [
			'uses' => 'ProductoController@destroy',
			'as'   => 'products.destroy'
		]);
	//Route::name('product.edit')->get('product/edit/{product}','ProductoController@edit');

	//Panel de admin
	Route::prefix('admin')->group(function () 
	{
	
	    Route::resource('users','UsersController');

		Route::get('users/{id}/destroy' , [
			'uses' => 'UsersController@destroy',
			'as'   => 'admin.users.destroy'

			]);

	});

	//CRUD EN CATEGORIAS
	Route::resource('categorias','CategoriasController');
	Route::get('categorias/{id}/destroy' , [
			'uses' => 'CategoriasController@destroy',
			'as'   => 'categorias.destroy'

			]);

	//CRUD EN TALLAS
	Route::resource('tallas','TallasController');
	Route::get('tallas/{id}/destroy' , [
			'uses' => 'TallasController@destroy',
			'as'   => 'tallas.destroy'

			]);

	//Ruta de imagenes
	Route::get('imagenes' , [
			'uses' => 'ImagenesController@index',
			'as'   => 'imagenes.index'

			]);

	Route::get('delete/{id}', array('as' => 'delete', 'uses' => 'ProductoController@borrar_imagenes'));

	//Ruta de pedidos
	Route::get('admin/orders' , [
			'uses' => 'OrderController@index',
			'as'   => 'admin.order.index'

			]);
	Route::get('order/get-Items/{id}' , [
			'uses' => 'OrderController@getItems',
			'as'   => 'admin.order.getItems'

			]);
	Route::get('order/{id}' , [
			'uses' => 'OrderController@destroy',
			'as'   => 'admin.order.destroy'

			]);

});

//Carrito----------------

Route::group(['middleware' => ['web']], function () {

Route::bind('producto' , function($slug){
	return App\Producto::where('slug',$slug)->first();

			});

Route::get('carrito/mostrar' , [
			'uses' => 'CarritoController@mostrar',
			'as'   => 'carrito.mostrar'

			]);
Route::get('carrito/añadir/{producto}' , [
			'uses' => 'CarritoController@añadir',
			'as'   => 'carrito.añadir'

			]);
Route::get('carrito/eliminar/{producto}' , [
			'uses' => 'CarritoController@eliminar',
			'as'   => 'carrito.eliminar'

			]);
Route::get('carrito/limpiar' , [
			'uses' => 'CarritoController@limpiar',
			'as'   => 'carrito.limpiar'

			]);
Route::get('carrito/actualizar/{producto}/{cantidad?}' , [
			'uses' => 'CarritoController@actualizar',
			'as'   => 'carrito.actualizar'

			]);

Route::get('orden.detalle' , [
			'middleware' => 'auth',
			'uses' => 'CarritoController@ordenDetalle',
			'as'   => 'orden.detalle'

			]);

//paypal-----------------
Route::get('payment' , [
			'uses' => 'PaypalController@postPayment',
			'as'   => 'payment'

			]);

Route::get('payment/status' , [
			'uses' => 'PaypalController@getPaymentStatus',
			'as'   => 'payment.status'

			]);



});





