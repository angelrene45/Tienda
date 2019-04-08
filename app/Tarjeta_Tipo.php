<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta_Tipo extends Model
{
    protected $table = "tarjeta_tipos";
    protected $primarykey = "id";
    protected $fillable = ['id','tarjeta'];

    public function Tarjeta){
    	return $this->belongTo(Tarjeta::class);
    }
}
