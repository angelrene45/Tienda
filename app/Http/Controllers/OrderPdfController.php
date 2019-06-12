<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderPdfController extends Controller
{
  protected $table = 'order_pdfs';
  protected $fillable = ['name_pdf', 'orden_id'];
  public $timestamps = false;

  public function orden()
  {
      return $this->belongsTo('App\Orden');
  }
}
