<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenItem;
use App\Direccion;
use App\Orden_pdfs;
use File;
use Laracasts\Flash\Flash;

class OrderController extends Controller
{
    public function index()
    {
    	$ordenes = Orden::orderBy('id', 'desc')->get();

      $ordenes->each(function($ordenes){
          $ordenes->direccion;
          $ordenes->comprador;
      });

    	return view('Admin.order.index', compact('ordenes'));
    }
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

          $returnHTML = view('Admin.order.detalle')->with(['orden'=>$orden,'item' => $items, 'totalMXN' => $totalMXN, 'totalUSD' => $totalUSD])->render();

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
    public function destroy(Request $request)
    {
      if($request->ajax()){
        $orden = Orden::findOrFail($request->idPedido);

        $deleted = $orden->delete();

        return response()->json([
          'success'=>'Pedido eliminado satisfactoriamente!'
        ]);

      }
    }

    public function updateItemIndex(Request $request){
      if($request->ajax()){
        $idPedido = $request->idPedido;
        $orden = Orden::where('id',$idPedido)->first();

        //obtiene los pdfs de la orden
        $orden->orden_pdf;

        $returnHTML = view('Admin.order.editar')->with(['orden'=>$orden])->render();

        return response()->json([
          'message'=>'Data is successfully added',
          'html' => $returnHTML,
          'orden' => $orden
        ]);
      }
    }

    public function updateItem(Request $request){

          $idPedido = $request->idPedido;
          $estatus = $request->estatus;
          $guias = $request->guias;

          $orden = Orden::findOrFail($idPedido);

          $orden->estatus = $estatus;
          $orden->guias = $guias;

          if($orden->guias == NULL){
            $orden->guias = "";
          }
          $orden->save();

          //manipulacion de pdf
          if($request->file('pdfs'))
          {

              $pdfs = $request->file('pdfs');

              foreach($pdfs as $pdf)
              {

                  $file = $pdf;
                  $name = 'pedido'.$idPedido.'_'. $file->getClientOriginalName();
                  $path = public_path() . '/pedidos/pdfs/';
                  $file->move($path,$name);

                  //Rellena mi tabla ordenPdf
                  $pdf_db = new Orden_pdfs();
                  $pdf_db->nombre_pdf = $name;
                  //$pdf_db->orden_id = $idPedido;
                  $pdf_db->orden()->associate($orden); //asociara el pdf en el campo orden_id
                  $pdf_db->save();
              }

          }

          Flash::success('Se ha actualizado el pedido exitosamente!')->important();

          return redirect()->route('admin.order.index');

    }

    public function downloadPdf($name){

        //PDF file is stored under project/public/download/info.pdf
        $file =  base_path().'/public/pedidos/pdfs/'.$name;


        return response()->download($file);

        //return Storage::download($file);

    }
    public function destroyPdf(Request $request){
      if($request->ajax()){
        $ruta = $request->rutaPdf;
        //PDF file is stored under project/public/download/info.pdf
        $file = base_path().'/public/pedidos/pdfs/'.$ruta;

        $message = "";

        if(File::exists($file))
        {
            File::delete($file);
            $dbpdf=Orden_pdfs::where('nombre_pdf','=', $ruta)->first();
            $dbpdf->delete();
            $message = "Archivo borrado";
        }else{
            $message = "El archivo no pudo ser borrado";
        }

        /*
        return response()->download($file);*/

        return response()->json([
          'message'=>$message,
          'ruta'=>$file
        ]);
      }
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
