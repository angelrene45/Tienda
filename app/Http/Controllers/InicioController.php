<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto; //para poder usar el modelo
use App\Categoria; //para poder usar el modelo
use App\Imagen;
use DB;
use PDF;

class InicioController extends Controller
{
	public function inicio(){

				//$productos = Producto::take(2)->paginate(2);
				$productos = DB::table('productos')->inRandomOrder()->limit(4)->get();

				if(count($productos)>0){
					//$productos = Producto::orderBy('id', 'desc')->paginate(3);

	        $productos->each(function($producto){
	            $producto->imagen = DB::table('imagenes')->where('producto_id',$producto->id)->first();
	        });

				}


    		return view('index')->with(['productos'=>$productos]);
    }

    public function descripcion($id){
    	$producto = Producto::find($id);
    	$producto->imagenes;
    	$producto->categoria;
			$producto->tallas;


    	return view('Principal.detalle')->with(['producto' => $producto]);
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
        	$categoriaid = $request->Categoria;

					if($filtro == "todo"){
						$productos = Producto::get();

						//dd($productos);
						//$productos = DB::table('productos')->where($filtro,'like','%'.$texto.'%')->paginate(9);
						//dd($productos);
						$productos->each(function($productos){
								$productos->categoria;
								$productos->imagenes;
						});

						return view('Principal.busqueda')->with(['productos' => $productos , 'palabra' => $categoriaid] );
					}



					if($texto == NULL){ //BUSCAMOS POR CATEGORIA
						$productos = Producto::where('categoria_id','=',$categoriaid)->get();

						//dd($productos);
						//$productos = DB::table('productos')->where($filtro,'like','%'.$texto.'%')->paginate(9);
						//dd($productos);
						$productos->each(function($productos){
								$productos->categoria;
								$productos->imagenes;
						});



						return view('Principal.busqueda')->with(['productos' => $productos , 'palabra' => $categoriaid] );

					}else{ //buscamos por filtro y texto

						$productos = Producto::search($texto)->paginate(9);
						//$productos = DB::table('productos')->where($filtro,'like','%'.$texto.'%')->paginate(9);
						//dd($productos);
						$productos->each(function($productos){
								$productos->categoria;
								$productos->imagenes;
						});


						return view('Principal.busqueda')->with(['productos' => $productos , 'palabra' => $texto] );
					}


    }

		public function indexBusqueda(Request $request){

				$categorias = Categoria::all();

				return view('Principal.indexBusqueda')->with(['categorias'=>$categorias]);

		}

}


//$productos = Producto::find(1);
//$productos->categoria;
//$productos->tallas;

//dd($productos);
