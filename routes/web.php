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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////// RUTAS AUTH ////////////////////////////////////////////////////////////////////////////////////

//middleware protege todas las rutas hasta que este autentificado
Route::group(['middleware' => 'auth'], function () {

Route::bind('producto' , function($slug){
	return App\Producto::where('slug',$slug)->first();

			});

Route::get('/', 'InicioController@inicio');


Route::name('inicio')->get('inicio/inicio','InicioController@inicio');

//Ruta para realizar pdf
Route::name('producto.pdf')->get('archivo/{id}/pdf','InicioController@pdf');

Route::name('producto.descripcion')->get('principal/{id}/{slug}','InicioController@descripcion');

Route::name('producto.busqueda')->get('inicio/busqueda/producto/','InicioController@busqueda');

Route::name('producto.indexBusqueda')->get('inicio/busqueda/','InicioController@indexBusqueda');

Route::get('carrito/mostrar' , [
			'uses' => 'CarritoController@mostrar',
			'as'   => 'carrito.mostrar'

			]);
Route::get('carrito/cotizacion' , [
			'uses' => 'CarritoController@cotizacionpdf',
			'as'   => 'carrito.cotizacion'

			]);
Route::get('carrito/añadir/{producto}' , [
			'uses' => 'CarritoController@añadir',
			'as'   => 'carrito.añadir'

			]);
	Route::get('carrito/add/{producto}' , [
				'uses' => 'CarritoController@add',
				'as'   => 'carrito.add'

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

Route::get('orden/solicitud' , [
			'middleware' => 'auth',
			'uses' => 'CarritoController@ordenSolicitud',
			'as'   => 'orden.solicitud'

			]);

Route::post('orden/detalle' , [
			'middleware' => 'auth',
			'uses' => 'CarritoController@ordenDetalle',
			'as'   => 'orden.detalle'

			]);

Route::post('orden/finalizar' , [
			'middleware' => 'auth',
			'uses' => 'CarritoController@ordenFinalizar',
			'as'   => 'orden.finalizar'

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

//Ruta Pedidos USUARIOS
Route::get('pedidos/index' , [
			'uses' => 'PedidosController@index',
			'as'   => 'pedidos.index'

			]);
Route::post('pedidos/detalle' , [
		'uses' => 'PedidosController@getItems',
		'as'   => 'pedido.detalle'

		]);
Route::get('pedidos/validar' , [
		'uses' => 'PedidosController@indexValidar',
		'as'   => 'pedidos.validar'

		]);

Route::post('pedidos/edicion' , [
		'uses' => 'PedidosController@updateItemIndex',
		'as'   => 'pedidos.item.edit'
		]);

Route::post('pedidos/edicion/estatus' , [
		'uses' => 'PedidosController@updateItem',
		'as'   => 'pedidos.status.edit'
		]);
Route::get('pedidos/ver/pdf/{name}' , [
		'uses' => 'PedidosController@downloadPdf',
		'as'   => 'pedidos.downloadPdf'

		]);

Route::get('pedido/pdf/{id}' , [
			'uses' => 'PedidosController@pedidopdf',
			'as'   => 'pedido.pdf'

			]);

});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////FIN DE RUTAS AUTH////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////RUTAS DEL PANEL DE ADMINISTRACIÓN////////////////////////////////////////////////////////////////
Route::group(['middleware' => 'admin'],function() //RUTAS PROTEGIDAS PARA USUARIOS ADMIN
{
			//Clear configurations:
			Route::get('/config-clear', function() {
				$status = Artisan::call('config:clear');
				return '<h1>Configurations cleared</h1>';
			});

			//Clear cache:
			Route::get('/cache-clear', function() {
				$status = Artisan::call('cache:clear');
				return '<h1>Cache cleared</h1>';
			});

			//Clear configuration cache:
			Route::get('/config-cache', function() {
				$status = Artisan::call('config:Cache');
				return '<h1>Configurations cache cleared</h1>';
			});

	Route::get('/home', 'HomeController@index')->name('home');

	Route::name('admin_inicio')->get('admin/inicio','AdminController@inicio');

	//CRUD EN PRODUCTOS
	Route::resource('products','ProductoController');
	Route::get('product/{id}/destroy' , [
			'uses' => 'ProductoController@destroy',
			'as'   => 'products.destroy'
		]);
	Route::post('products/excel' , [
			'uses' => 'ProductoController@importExcel',
			'as'   => 'productos.importExcel'

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
	Route::post('categorias/excel' , [
			'uses' => 'CategoriasController@importExcel',
			'as'   => 'categorias.importExcel'

			]);

	//CRUD EN DIRECCIONES
	Route::resource('direcciones','DireccionesController');
	Route::get('direcciones/{id}/destroy' , [
			'uses' => 'DireccionesController@destroy',
			'as'   => 'direcciones.destroy'

			]);
	Route::post('direcciones/excel' , [
			'uses' => 'DireccionesController@importExcel',
			'as'   => 'direcciones.importExcel'

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
	Route::post('order/get-Items' , [
			'uses' => 'OrderController@getItems',
			'as'   => 'admin.order.getItems'

			]);
	Route::post('order/update-Item/index' , [
			'uses' => 'OrderController@updateItemIndex',
			'as'   => 'admin.update.item.index'

			]);
	Route::post('order/update-Item' , [
			'uses' => 'OrderController@updateItem',
			'as'   => 'admin.update.item'

			]);
	Route::post('order/update-Item/pdf' , [
			'uses' => 'OrderController@downloadPdf',
			'as'   => 'admin.order.pdf'
			]);
	Route::get('order/update-Item/pdf/{name}' , [
			'uses' => 'OrderController@downloadPdf',
			'as'   => 'admin.order.downloadPdf'

			]);
	Route::post('order/update-Item/destroy/pdf' , [
			'uses' => 'OrderController@destroyPdf',
			'as'   => 'admin.order.pdf.destroy'

			]);
	Route::post('order/destroy' , [
			'uses' => 'OrderController@destroy',
			'as'   => 'admin.order.destroy'
			]);

});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////FIN DE RUTAS PANEL DE ADMINISTRACIÓN////////////////////////////////////////////////////////////////
