<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagenes";
    protected $primarykey = "id";
    protected $fillable = ['id','producto_id','imagen'];

    public function producto(){
    	return $this->belongsTo(Producto::class);
    }
}
