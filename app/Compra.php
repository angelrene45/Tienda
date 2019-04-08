<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";
    protected $primarykey = "id";
    protected $fillable = ['id','cantidad'];

    public function producto){
    	return $this->belongsTo(Producto::class);
    }

    public function user){
    	return $this->belongsTo(User::class);
    }


}
