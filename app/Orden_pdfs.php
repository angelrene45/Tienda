<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden_pdfs extends Model
{
  protected $table = 'orden_pdfs';
  protected $fillable = ['nombre_pdf', 'orden_id'];
  public $timestamps = false;

  public function orden()
  {
      return $this->belongsTo('App\Orden');
  }
}
