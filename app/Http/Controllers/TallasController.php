<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talla;

class TallasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tallas = Talla::search($request->buscador)->paginate(7);

        return view('Tallas.index')->with(['tallas' => $tallas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tallas.create');
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
        'talla' => 'required|max:120|unique:tallas|string',
        ]);

        $talla = new Talla($request->all());
        $talla->save();

        flash('La talla ' .$talla->talla. ' se ha agregado satisfactoriamente')->success()->important();
        return redirect('tallas');
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
        $talla = Talla::find($id);
        return view('Tallas.edit')->with(['talla'=>$talla]);
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
        'talla' => 'required|max:120|unique:tallas',
        ]);

        $talla = Talla::find($id);
        $talla->talla = $request->talla;
        $talla->save();

        flash('La talla ' .$talla->talla. ' se ha acualizado satisfactoriamente')->success()->important();
        return redirect('tallas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talla=Talla::find($id);
        $talla->delete();

        flash('Se ha eliminado la talla '. $talla->talla .' satisfactoriamente!')->warning()->important();
        return redirect('tallas');
    }
}
