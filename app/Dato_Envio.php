<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato_Envio extends Model
{
    protected $table = "datos__envio";
    protected $primarykey = "id";
    protected $fillable = ['id','codigo_postal','colonia','calle','numero_exterior','estado','telefono'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
