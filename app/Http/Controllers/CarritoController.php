<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
use Laracasts\Flash\Flash;

class CarritoController extends Controller
{
   public function _construct()
	{
		if(!\Session::has('carrito')) \Session::put('carrito' , array());
	}

    //mostrar carrito
    public function mostrar(){

    	$carrito = \Session::get('carrito');
    	$total = $this->total();
    	return view ('Principal.carrito', compact('carrito','total'));
    }

    //agregar item
    public function añadir(Producto $producto, Request $request){

    	$carrito = \Session::get('carrito');
    	$producto->cantidad = 1;
        $producto->talla = $request->talla;
    	$producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();
    	$carrito[$producto->slug] = $producto;

    	\Session::put('carrito' , $carrito);


    	return redirect()->route('carrito.mostrar');
    }

    //quitar item

    public function eliminar(Producto $producto){
    	$carrito = \Session::get('carrito');
    	unset($carrito[$producto->slug]);
    	\Session::put('carrito' , $carrito);

    	return redirect()->route('carrito.mostrar');
    }

    //actualizar item
    public function actualizar(Producto $producto, $cantidad){
    	$carrito = \Session::get('carrito');

        if($cantidad <= $producto->stock ){
    	$carrito[$producto->slug]->cantidad=$cantidad;
    	\Session::put('carrito' , $carrito);
        }else{
            $carrito[$producto->slug]->cantidad=$producto->stock;
            \Session::put('carrito' , $carrito);
            Flash::warning('Ha excedido el maximo de disponibilidad de articulos')->important(); 
        }

    	return redirect()->route('carrito.mostrar');
    }

    //vaciar carrito
    public function limpiar(){
    	\Session::forget('carrito');

    	return redirect()->route('carrito.mostrar');
    }

    //obetener total carrito
    private function total(){
    	$carrito = \Session::get('carrito');
    	$total = 0;

    	if(count($carrito)){
    		foreach($carrito as $item){
    		$total += $item->precio * $item->cantidad;
    		}
    	}
    	

    	return $total;
    }

    public function ordenDetalle(){
        if(count(\Session::get('carrito')) <= 0) return redirect()->route('inicio');
        $carrito = \Session::get('carrito');
        $total = $this->total();

        return view('Principal.ordenDetalle' , compact('carrito' , 'total'));
    }
}
