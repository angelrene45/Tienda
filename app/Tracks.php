<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracks extends Model
{
  protected $table = 'tracks';
  protected $fillable = ['num_track', 'orden_id'];

  public function orden()
  {
      return $this->belongsTo('App\Orden');
  }
}
