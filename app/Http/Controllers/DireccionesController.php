<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;

class DireccionesController extends Controller
{

    public function index()
    {
      $direcciones = Direccion::paginate(7);
      return view('Admin.direcciones.index')->with(['direcciones' => $direcciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.direcciones.create');
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
        'codigo_postal' => 'required|numeric',
        'colonia' => 'required',
        'calle' => 'required',
        'numero_exterior' => 'required',
        'estado' => 'required',
        'municipio' => 'required',
      ]);

      $direccion = new Direccion($request->all());
      $direccion->save();

      flash('La direccion se ha agregado satisfactoriamente')->success()->important();
      return redirect('direcciones');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      $direccion = Direccion::find($id);
      return view('Admin.direcciones.edit')->with(['direccion'=>$direccion]);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'codigo_postal' => 'required|numeric',
        'colonia' => 'required',
        'calle' => 'required',
        'numero_exterior' => 'required',
        'estado' => 'required',
        'municipio' => 'required',
      ]);

      $direccion = Direccion::find($id);
      $direccion->codigo_postal = $request->codigo_postal;
      $direccion->colonia = $request->colonia;
      $direccion->calle = $request->calle;
      $direccion->numero_exterior = $request->numero_exterior;
      $direccion->estado = $request->estado;
      $direccion->municipio = $request->municipio;

      $direccion->save();

      flash('La Direccion se ha actualizado satisfactoriamente')->success()->important();
      return redirect('direcciones');
    }


    public function destroy($id)
    {
      $direccion=Direccion::find($id);
      $direccion->delete();

      flash('Se ha eliminado la direccion satisfactoriamente!')->warning()->important();
      return redirect('direcciones');
    }
}
