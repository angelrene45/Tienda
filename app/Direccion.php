<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direcciones";
    protected $primarykey = "id";
    protected $fillable = ['id','codigo_postal','colonia','calle','numero_exterior','estado','municipio'];

    public function orden()
    {
        return $this->hasOne('App\Orden');
    }

}
