<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use App\OrdenItem;


class OrderController extends Controller
{
    public function index()
    {
    	$ordenes = Orden::orderBy('id', 'desc')->paginate(5);
    	
    	//dd($ordenes[0]->orden_items);

    	return view('Admin.order.index', compact('ordenes'));
    }
    public function getItems($id)
    {
    	$item = OrdenItem::with('producto')->where('orden_id', $id)->get();

    	$item->each(function($item){ 
            $item->producto->imagenes;
        });

    	//dd($item);
    	return view('Admin.order.detalle')->with(['orden' => $item]);
    }
    public function destroy($id)
    {
        $orden = Order::findOrFail($id);
        
        $deleted = $orden->delete();
        
        $message = $deleted ? 'Pedido eliminado correctamente!' : 'El Pedido NO pudo eliminarse!';
        
        return redirect()->route('admin.order.index')->with('message', $message);
    }
}
