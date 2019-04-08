<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\Categoria;
use App\Producto;
use App\Talla;
use App\Imagen;
use Laracasts\Flash\Flash;
use PDF;
use DB;
use File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::paginate(7);
        //nos ayudara a saber las tallas de cada producto
        $producto->each(function($producto){ 
            $producto->tallas;
        });


        return view('Productos.index')->with(['productos' => $producto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();

        return view('Productos.create')->with(['categorias'=> $categorias , 'tallas' => $tallas]); //carpeta.archivo
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'Nombre' => 'required|max:120',
        'Descripcion' => 'required',
        'Precio' => 'required|numeric', 
        'Stock' => 'required|numeric',
        'Categoria' => 'required',
        'Tallas' => '',
        'imagen' => 'max:3|',
        ]);
        
        $producto = new Producto;
        $producto->nombre = $request->Nombre; //id en el formulario
        $producto->descripcion = $request->Descripcion; 
        $producto->precio = $request->Precio; 
        $producto->categoria_id = $request->Categoria;
        $producto->stock = $request->Stock; 

        //Da de alta el producto en la base de datos
        $producto->save(); 

        //rellena mi tabla pivote
        $producto->tallas()->sync($request->tallas);

        //manipulacion de imagenes
        if($request->file('imagen'))
        {

            $imagenes = $request->file('imagen');
            
            foreach($imagenes as $imagen)
            {

                $file = $imagen;
                $name = 'tiendaOnline_' . time() . $file->getClientOriginalName();
                $path = public_path() . '/images/productos/';
                $file->move($path,$name);


                //Rellena mi tabla imagen
                $imagen = new Imagen();
                $imagen->imagen = $name;
                $imagen->producto()->associate($producto); //asociara la imagen en el campo producto_id
                $imagen->save();
            }
        }


        Flash::success('Se ha dado de alta el producto exitosamente!')->important();
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias=Categoria::all();
        $tallas = Talla::all();

        //Mostrar las tallas que tiene el producto
        $misTallas = $producto->tallas;

        //Mostrar las imagenes del producto
        $imagenes = DB::table('imagenes')->where('producto_id',$producto->id)->get();
        
       
        return view('Productos.edit')->with(['categorias' => $categorias , 'producto' => $producto , 'misTallas' => $misTallas , 'tallas' => $tallas , 'imagenes' => $imagenes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'Nombre' => 'required|max:120',
        'Descripcion' => 'required',
        'Precio' => 'required|numeric', 
        'Stock' => 'required|numeric',
        'Categoria' => 'required',
        'imagen' => 'max:3|',
        'Tallas' => '',
        
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->Nombre; //id en el formulario
        $producto->descripcion = $request->Descripcion; //id en el formulario
        $producto->precio = $request->Precio; //id en el formulario
        $producto->categoria_id = $request->Categoria; //id en el formulario
        $producto->stock = $request->Stock; //id en el formulario

        $producto->save(); //Da de alta el producto en la base de datos

        $producto->tallas()->sync($request->tallas); //rellena mi tabla pivote

        //manipulacion de imagenes
        if($request->file('imagen'))
        {

            $imagenes = $request->file('imagen');
            
            foreach($imagenes as $imagen)
            {

                $file = $imagen;
                $name = 'tiendaOnline_' . time() . $file->getClientOriginalName();
                $path = public_path() . '/images/productos/';
                $file->move($path,$name);


                //Rellena mi tabla imagen
                $imagen = new Imagen();
                $imagen->imagen = $name;
                $imagen->producto()->associate($producto); //asociara la imagen en el campo producto_id
                $imagen->save();
            }
        }


        Flash::success("Se ha actualizado el producto satisfactoriamente!")->important();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        
        $producto = Producto::find($id)->first();

        $path = public_path() . '/images/productos/';
        $imagenes=Imagen::where('producto_id','=', $producto->id)->get();

        if($imagenes != null)
        {
            foreach($imagenes as $imagen)
            {
                $name=$imagen->imagen; 

                $file=$path.$name;

               
                if(File::exists($file))
                {
                    File::delete($file);
                }
            }
        }

        $producto->delete();
        

        Flash::success("El producto se ha borrado satisfactoriamente!")->important();
        return redirect()->route('products.index');
    }

        public function borrar_imagenes($id){
        $imagenes = DB::table('imagenes')->where('producto_id', '=', $id)->get();

        
        foreach($imagenes as $imagen)
        {
            $path = public_path() . '/images/productos/';
            $name=$imagen->imagen; 

            $file=$path.$name;



            if(File::exists($file)){
                File::delete($file);
            }
        }

        DB::table('imagenes')->where('producto_id', '=', $id)->delete(); //borramos imagenes en la base de datos

        Flash::success("Las imagenes se han borrado correctamente!")->important();
        
        
        return redirect()->route('products.edit', [$id]);
    }
}
