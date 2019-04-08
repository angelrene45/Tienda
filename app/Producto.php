<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Producto extends Model
{

    protected $table = "productos";
    protected $primarykey = "id";
    protected $fillable = ['id','nombre','descripcion','precio','stock','categoria_id','vendido'];


    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    public function scopeSearch($query , $producto){
        return $query->where('nombre' , 'LIKE','%'.$producto.'%')->orwhere('descripcion', 'like','%'.$producto.'%');
    }
    
    public function imagenes(){
    	return $this->hasMany(Imagen::class);
    }

    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

    public function tallas(){
    	return $this->belongsToMany(Talla::class);
    }

     public function compras(){
    	return $this->hasMany(Compra::class);
    }

      public function orden_item(){
        return $this->hasone(OrdenItem::class);
    }


}
