<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
	protected $fillable = ['subtotal', 'envio', 'user_id'];
	// Relation with User
	public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function orden_items()
	{
	    return $this->hasMany('App\OrdenItem');
	}
}
