<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use DB;
use Laracasts\Flash\Flash;
use Auth;
use App\User;
use App\Direccion;
use App\OrdenItem;
use App\Orden;
use Illuminate\Support\Facades\Mail;

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
        if(!empty(\Session::get('carrito'))){
          $type = Auth::user()->type;
          $direcciones = Direccion::all();

          if($type == "member"){
            $compradores = User::where('type', 'purchaser')->get();
            return view('Principal.ordenSolicitud')->with(['compradores'=> $compradores, 'direcciones' => $direcciones]);
          }else{
            return view('Principal.ordenSolicitud')->with(['direcciones' => $direcciones]);
          }
        }else {
          return redirect()->route('inicio');
        }

    }

    public function ordenDetalle(Request $request){


      $type = Auth::user()->type;

      if($type == "member"){
        $compradorid = $request->purchaser;
        $direccion = Direccion::where('id',$request->direccion)->first();
        $comprador = User::where('id', $compradorid)->first();
        if(count(\Session::get('carrito')) <= 0) return redirect()->route('inicio');
        $carrito = \Session::get('carrito');
        $totalMXN = $this->totalMXN();
        $totalUSD= $this->totalUSD();

        $data = ['carrito' => $carrito , 'totalMXN' => $totalMXN,'totalUSD'=> $totalUSD];

        return view('Principal.ordenDetalle' , compact('carrito','totalMXN','totalUSD','direccion','comprador'));
      }else{
        //es usuario purchaser y no necesita validar el pedido
        $compradorid = $request->purchaser;
        $direccion = Direccion::where('id',$request->direccion)->first();
        if(count(\Session::get('carrito')) <= 0) return redirect()->route('inicio');
        $carrito = \Session::get('carrito');
        $totalMXN = $this->totalMXN();
        $totalUSD= $this->totalUSD();

        $data = ['carrito' => $carrito , 'totalMXN' => $totalMXN,'totalUSD'=> $totalUSD];

        return view('Principal.ordenDetalle' , compact('carrito','totalMXN','totalUSD','direccion'));

      }

    }

    public function ordenFinalizar(Request $request){

      $direccionid = $request->direccionid;
      $compradorid = $request->compradorid;
      $compradoremail = $request->compradoremail;
      $status = "En validacion";

      $type = Auth::user()->type;
      $nameUser = Auth::user()->name;

      if($type == "purchaser"){
        $status = "Validada";
        $compradorid = \Auth::user()->id;
      }

      $carrito = \Session::get('carrito');


      //$this->saveOrder($carrito,$status,$direccionid,$compradorid);
      //\Session::forget('carrito');

      $this->sendEmailToPurchaser($compradoremail,$nameUser);

      flash('Pedido realizado de forma correcta')->success()->important();
      return redirect('inicio/inicio');

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

    private function saveOrder($carrito,$status,$direccionid,$compradorid)
    {

        $orden = Orden::create([
            'estatus' => $status,
            'user_id' => \Auth::user()->id,
            'user_comp_id' => $compradorid,
            'direccion_id' => $direccionid,
            'guias' => ''
        ]);

        foreach($carrito as $item){
            $this->saveOrderItem($item, $orden->id);
        }

    }

    private function saveOrderItem($item, $orden_id)
    {
      OrdenItem::create([
        'cantidad' => $item->cantidad,
        'precio' => $item->precio,
        'moneda' => $item->moneda,
        'producto_id' => $item->id,
        'orden_id' => $orden_id
      ]);

      //actualizo el stock y vendido de mi producto
      $producto = Producto::find($item->id);
      $producto->vendido += $item->cantidad;
      $producto->save();
    }

    private function sendEmailToPurchaser($emailComprador,$nameUser){

      $data = array(
          'email' => $emailComprador,
          'nameUser' => $nameUser
      );

      Mail::send('emails.validacion', $data, function ($message) use ($emailComprador) {
              $message->from('tienda@gova.com.mx', 'Pedido pendiente');
              $message->to($emailComprador)->subject('Validación de orden');
          });




      dd("Enviado");

    }
}
