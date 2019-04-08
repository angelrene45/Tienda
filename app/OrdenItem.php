<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenItem extends Model
{
    protected $table = 'orden_items';
	protected $fillable = ['precio', 'cantidad', 'producto_id', 'orden_id'];
	public $timestamps = false;

	public function orden()
	{
	    return $this->belongsTo('App\Orden');
	}
	public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
