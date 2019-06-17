<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
use Laracasts\Flash\Flash;
use Auth;
use App\User;

class CarritoController extends Controller
{
   public function _construct()
	{
		if(!\Session::has('carrito')) \Session::put('carrito' , array());
	}

    //mostrar carrito
    public function mostrar(){

    	$carrito = \Session::get('carrito');
    	$totalMXN = $this->totalMXN();
    	$totalUSD= $this->totalUSD();

    	return view ('Principal.carrito', compact('carrito','totalMXN','totalUSD'));


    }

    //agregar item
    public function añadir(Producto $producto, Request $request){

    	$carrito = \Session::get('carrito');
    	$producto->cantidad = 1;
      $producto->talla = $request->talla;
    	$producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();
    	$carrito[$producto->id] = $producto;

    	\Session::put('carrito' , $carrito);


    	return redirect()->route('carrito.mostrar');
    }

    public function add(Producto $producto, Request $request){

      if($request->ajax()){
        $carrito = \Session::get('carrito');
      	$producto->cantidad = $request->cantidad;
        $producto->moneda = $request->moneda;
      	$producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();
      	$carrito[$producto->id] = $producto;

        \Session::put('carrito' , $carrito);


        return response()->json([
          'total' => count(\Session::get('carrito')),
          'message' => 'Añadido correctamente'
        ]);
      }


    }

    //quitar item

    public function eliminar(Producto $producto){
    	$carrito = \Session::get('carrito');
    	unset($carrito[$producto->id]);
    	\Session::put('carrito' , $carrito);

    	return redirect()->route('carrito.mostrar');
    }

    //actualizar item
    public function actualizar(Producto $producto, $cantidad){
    	$carrito = \Session::get('carrito');
      /*if($cantidad <= $producto->stock){
        	$carrito[$producto->id]->cantidad=$cantidad;
        	\Session::put('carrito' , $carrito);
      }else{
          $carrito[$producto->id]->cantidad=$producto->stock;
          \Session::put('carrito' , $carrito);
          Flash::warning('Ha excedido el maximo de disponibilidad de articulos')->important();
        }*/

        $carrito[$producto->id]->cantidad=$cantidad;
        \Session::put('carrito' , $carrito);

    	return redirect()->route('carrito.mostrar');
    }

    //vaciar carrito
    public function limpiar(){
    	\Session::forget('carrito');

    	return redirect()->route('carrito.mostrar');
    }

    //obetener total carrito
    private function totalMXN(){
    	$carrito = \Session::get('carrito');
    	$totalmxn = 0;

    	if(!empty($carrito)){
    		foreach($carrito as $item){
          if($item->moneda == "MXN"){
    		    $totalmxn += $item->precio * $item->cantidad;
          }
    		}
    	}


    	return $totalmxn;
    }

    //obetener total carrito
    private function totalUSD(){
      $carrito = \Session::get('carrito');
      $totalusd = 0;

      if(!empty($carrito)){
        foreach($carrito as $item){
          if($item->moneda == "USD"){
            $totalusd += $item->precio * $item->cantidad;
          }
        }
      }


      return $totalusd;
    }

    public function ordenSolicitud(){
        //solo los tipo de usuario member tendran que solicitar la autorizacion del pedidos
        //los usuaros compradores(purchaser) automaticamente autirizan el pedido
        $type = Auth::user()->type;
        $compradores = User::where('type', 'purchaser')->get();

        if($type == "member"){
          return view('Principal.ordenSolicitud')->with(['compradores'=> $compradores]);
        }else{
          return view('Principal.ordenDetalle');
        }

    }

    public function ordenDetalle(Request $request){

        $type = Auth::user()->type;

        if($type == "member"){
          $compradorid = $request->purchaser;
          $comprador = User::where('id', $compradorid)->first();
          if(count(\Session::get('carrito')) <= 0) return redirect()->route('inicio');
          $carrito = \Session::get('carrito');
          $totalMXN = $this->totalMXN();
          $totalUSD= $this->totalUSD();

          $data = ['carrito' => $carrito , 'totalMXN' => $totalMXN,'totalUSD'=> $totalUSD];

          return view('Principal.ordenDetalle' , compact('carrito','totalMXN','totalUSD'));
        }else{
          //es usuario purchaser y no necesita validar el pedido
        }



    }

    public function cotizacionpdf(){
      $carrito = \Session::get('carrito');
    	$totalMXN = $this->totalMXN();
    	$totalUSD= $this->totalUSD();

      $data = ['carrito' => $carrito , 'totalMXN' => $totalMXN,'totalUSD'=> $totalUSD];

      //return view('Principal.cotizacionpdf',$data);

      $pdf = \PDF::loadView('Principal.cotizacionpdf' , $data);

      return $pdf->download('cotizacion.pdf');
    }
}
