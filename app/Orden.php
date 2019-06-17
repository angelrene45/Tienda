<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
  protected $table = 'ordenes';
	protected $fillable = ['subtotal', 'envio', 'user_id','user_comp_id','direccion_id','estatus'];
	// Relation with User
	public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function orden_items()
	{
	    return $this->hasMany('App\OrdenItem');
	}
  public function tracks()
	{
	    return $this->hasMany('App\Track');
	}
  public function orden_pdf()
	{
	    return $this->hasMany('App\Orden_pdf');
	}

  public function direccion()
    {
        return $this->hasOne('App\Direccion');
    }
}
