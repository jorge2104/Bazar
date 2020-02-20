<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pagos;
use App\ventas;

class pago_venta extends Model
{
  public function pagos()
  {
    return $this->belongsTo(pagos::class , "pago_id");
  }

  public function ventas()
  {
    return $this->belongsTo(ventas::class , "venta_id");
  }
}
