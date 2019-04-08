<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::all();
        $imagenes->each(function($imagenes){
            $imagenes->producto;
        });
        return view('Imagenes.index')->with(['imagenes' => $imagenes]);
    }

}
