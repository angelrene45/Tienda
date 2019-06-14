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

				$masvendido = 0;

				if(count($productos)>0){
					//$productos = Producto::orderBy('id', 'desc')->paginate(3);

	        $productos->each(function($productos){
	            $productos->categoria;
	            $productos->imagenes;
	        });

	        $max = Producto::max('vendido');
	        $masvendido = Producto::where('vendido' , '>=' , $max)->get();

	        $masvendido->each(function($masvendido){
	            $masvendido->imagenes;
	        });
				}

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


        $producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();

				//$pdf = PDF::loadView('invoice');
				//return $pdf->download('invoice.pdf');

				$data = ['categorias' => $categorias , 'producto' => $producto ];

				//return view('Productos.vistapdf',$data);


        $pdf = \PDF::loadView('Productos.vistapdf' , $data);

        return $pdf->download($producto->codigo.'.pdf');
    }

    public function busqueda(Request $request){

        	$filtro = $request->Filtro;
        	$texto = $request->Texto;

          $productos = Producto::search($texto)->paginate(9);
          //$productos = DB::table('productos')->where($filtro,'like','%'.$texto.'%')->paginate(9);
					//dd($productos);
          $productos->each(function($productos){
              $productos->categoria;
              $productos->imagenes;
          });


	      	return view('Principal.busqueda')->with(['productos' => $productos , 'palabra' => $texto] );
    }

		public function indexBusqueda(Request $request){

				return view('Principal.indexBusqueda');

		}

}


//$productos = Producto::find(1);
//$productos->categoria;
//$productos->tallas;

//dd($productos);
