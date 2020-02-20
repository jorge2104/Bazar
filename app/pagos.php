<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pago_venta;

class pagos extends Model
{

  public function pago_venta()
  {
    return $this->hasMany(pago_venta::class, 'pago_id');
  }

}
