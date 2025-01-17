<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Producto extends Model
{
    protected $table = "productos";
    protected $primarykey = "id";
    protected $fillable = ['id','codigo','nombre','descripcion','precio','moneda','stock','categoria_id','vendido'];


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
        return $query->where('codigo' , 'LIKE','%'.$producto.'%')->orwhere('nombre', 'like','%'.$producto.'%');
    }

    public function imagenes(){
    	return $this->hasMany(Imagen::class);
    }

    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

     public function compras(){
    	return $this->hasMany(Compra::class);
    }

      public function orden_item(){
        return $this->hasone(OrdenItem::class);
    }


}
