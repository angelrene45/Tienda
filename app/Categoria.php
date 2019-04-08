<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";
    protected $primarykey = "id";
    protected $fillable = ['id','nombre'];

    public function productos(){
    	return $this->hasMany(Producto::class);
    }
    
}
