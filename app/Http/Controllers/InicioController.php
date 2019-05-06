<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto; //para poder usar el modelo
use App\Talla; //para poder usar el modelo
use App\Categoria; //para poder usar el modelo
use App\Imagen;
use DB;
use PDF;

class InicioController extends Controller
{
	public function inicio(){
		$productos = Producto::
                orderBy('id', 'desc')
                ->limit(6)
                ->get();

        $productos->each(function($productos){
            $productos->categoria;
            $productos->imagenes;
        });

        $max = Producto::max('vendido');
        $masvendido = Producto::where('vendido' , '>=' , $max)->get();

        $masvendido->each(function($masvendido){
            $masvendido->imagenes;
        });

    	return view('index')->with(['productos'=>$productos , 'masvendido' => $masvendido]);
    }

    public function descripcion($id){
    	$producto = Producto::find($id);
    	$producto->imagenes;
    	$producto->categoria;
		$producto->tallas;

		$tallas = Talla::all();

    	return view('Principal.detalle')->with(['producto' => $producto , 'tallas' => $tallas]);
    }


    public function pdf($id){
        $producto = Producto::find($id);
        $categorias=Categoria::all();
        $tallas = Talla::all();

        //Mostrar las tallas que tiene el producto
        $misTallas = $producto->tallas;

        $producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();

				//$pdf = PDF::loadView('invoice');
				//return $pdf->download('invoice.pdf');

				$data = ['categorias' => $categorias , 'producto' => $producto , 'misTallas' => $misTallas , 'tallas' => $tallas ];


        $pdf = \PDF::loadView('Productos.vistapdf' , $data);

				//return view('Productos.vistapdf')->with(['categorias' => $categorias , 'producto' => $producto , 'misTallas' => $misTallas , 'tallas' => $tallas ]);
        return $pdf->download('Productoprint.pdf');
    }

    public function busqueda(Request $request){

        $palabra = $request->buscador;

            $productos = Producto::search($request->buscador)->paginate(9);
            $productos->each(function($productos){
                $productos->categoria;
                $productos->imagenes;
            });



        return view('Principal.productos')->with(['productos' => $productos , 'palabra' => $palabra] );
    }

}


//$productos = Producto::find(1);
//$productos->categoria;
//$productos->tallas;

//dd($productos);
