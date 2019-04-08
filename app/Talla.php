<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = "tallas";
    protected $primarykey = "id";
    protected $fillable = ['id','talla'];

    public function productos(){
    	return $this->belongsToMany(Producto::class);
    }

    public function scopeSearch($query , $talla){
    	return $query->where('talla' , 'LIKE','%'.$talla.'%');
    }
}
