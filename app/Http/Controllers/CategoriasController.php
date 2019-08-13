<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Excel;
use Illuminate\Validation\Rule;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(7);
        return view('Categorias.index')->with(['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias.create');
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
        'nombre' => 'required|max:120|unique:categorias',
        ]);

        $categoria = new Categoria($request->all());
        $categoria->save();

        flash('La categoria ' .$categoria->nombre. ' se ha agregado satisfactoriamente')->success()->important();
        return redirect('categorias');
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
        $categoria = Categoria::find($id);
        return view('Categorias.edit')->with(['categoria'=>$categoria]);
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
        'nombre' => 'required|max:120|unique:categorias',
        ]);

        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        flash('La categoria ' .$categoria->nombre. ' se ha agregado satisfactoriamente')->success()->important();
        return redirect('categorias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();

        flash('Se ha eliminado la categoria '. $categoria->nombre .' satisfactoriamente!')->warning()->important();
        return redirect('categorias');
    }

    public function importExcel(Request $request){
      $this->validate($request, [
        'excel_data' => 'required|mimes:xls,xlsx'
      ]);

      $path = $request->file('excel_data')->getRealPath();

      //Linea de validacion
      app()->bind('Illuminate\Contracts\Bus\Dispatcher', 'Illuminate\Bus\Dispatcher');

      $data = Excel::load($path)->get();

      //recorre todo el excel
      if($data->count() > 0){
        foreach($data->toArray() as $key => $row){
          $categoria = new Categoria;
          $categoria->id = $row['id']; //id en el formulario
          $categoria->nombre = $row['nombre']; //id en el formulario

          //Da de alta el producto en la base de datos
          $categoria->save();
        }

        //insertar en la base de datos
        flash('Categorias agregados corectamente! ')->success()->important();
        return redirect('products.index');


      }
    }
}
