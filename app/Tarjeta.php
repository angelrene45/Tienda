<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = "tarjetas";
    protected $primarykey = "id";
    protected $fillable = ['id','tipo','numero','vencimiento','codigo','id_usuario'];

    public function Tarjeta_Tipo){
    	return $this->hasOne(Tarjeta_Tipo::class);
    }

    public function user){
    	return $this->belongsTo(User::class);
    }
}
