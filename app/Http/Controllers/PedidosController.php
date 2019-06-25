<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenItem;
use App\Direccion;
use App\Orden_pdfs;
use File;
use Auth;

class PedidosController extends Controller
{
    public function index()
    {
      //obtemeos el tipo de usuario que solicita los pedidos
      $typeUser = auth()->user()->type;
      $idUser = auth()->user()->id;

      $ordenes = Orden::where('user_id', $idUser)->get();
      $ordenes->each(function($ordenes){
          $ordenes->direccion;
          $ordenes->comprador;
      });

      return view('Pedidos.index', compact('ordenes'));

    }
    public function indexValidar()
    {
      //obtemeos el tipo de usuario que solicita los pedidos
      $typeUser = auth()->user()->type;
      $idUser = auth()->user()->id;

      if($typeUser == "purchaser"){//compradores
        $ordenes = Orden::where('user_comp_id', $idUser)->where('user_id','!=',$idUser)->get();
        $ordenes->each(function($ordenes){
            $ordenes->direccion;
            $ordenes->comprador;
        });

        return view('Pedidos.indexValidar', compact('ordenes'));
      }else{
        return redirect('inicio/inicio');
      }

    }

    //detalle del pedido
    public function getItems(Request $request)
    {

      if($request->ajax()){
          $idPedido = $request->idPedido;

          $orden = Orden::where('id',$idPedido)->first();
          $orden->direccion;
          $orden->comprador;
          $orden->user;
          $orden->orden_pdf;


        	$items = OrdenItem::with('producto')->where('orden_id', $idPedido)->get();

        	$items->each(function($item){
                $item->producto->imagenes;
          });

          $totalMXN = $this->totalMXN($items);
        	$totalUSD = $this->totalUSD($items);

          $returnHTML = view('Pedidos.detalle')->with(['orden'=>$orden,'item' => $items, 'totalMXN' => $totalMXN, 'totalUSD' => $totalUSD])->render();

          return response()->json([
            'success'=>'Data is successfully added',
            'html' => $returnHTML,
            'totalMXN' => $totalMXN,
            'totalUSD' => $totalUSD,
            'orden' => $orden
          ]);
      }

    	//dd($item);
    	//return view('Admin.order.detalle')->with(['orden' => $item]); */
    }

    public function updateItemIndex(Request $request){
      if($request->ajax()){
        $idPedido = $request->idPedido;
        $orden = Orden::where('id',$idPedido)->first();

        //obtiene los pdfs de la orden
        $orden->orden_pdf;

        $returnHTML = view('Pedidos.editarEstatus')->with(['orden'=>$orden])->render();

        return response()->json([
          'success'=>'Data is successfully added',
          'html' => $returnHTML,
          'orden' => $orden
        ]);
      }
    }

    public function updateItem(Request $request){
      if($request->ajax()){
          $idPedido = $request->idPedido;
          $estatus = $request->estatus;
          $orden = Orden::findOrFail($idPedido);

          $orden->estatus = $estatus;
          $orden->save();

          return response()->json([
            'message'=>'Pedido Actualizado'
          ]);
      }
    }

    public function downloadPdf($name){

        //PDF file is stored under project/public/download/info.pdf
        $file =  base_path().'/public/pedidos/pdfs/'.$name;


        return response()->download($file);

        //return Storage::download($file);

    }

    //obetener total carrito
    private function totalMXN($items){
    	$totalmxn = 0;

    	if(!empty($items)){
    		foreach($items as $item){
          if($item->moneda == "MXN"){
    		    $totalmxn += $item->precio * $item->cantidad;
          }
    		}
    	}

    	return $totalmxn;
    }

    //obetener total carrito
    private function totalUSD($items){
      $totalusd = 0;

      if(!empty($items)){
        foreach($items as $item){
          if($item->moneda == "USD"){
            $totalusd += $item->precio * $item->cantidad;
          }
        }
      }


      return $totalusd;
    }
}
