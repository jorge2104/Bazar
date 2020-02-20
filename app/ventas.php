<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\productos;
use App\User;

class ventas extends Model
{

  public function producto()
  {
    return $this->belongsTo(productos::class, 'producto_id');
  }

  public function quien_compra()
  {
    return $this->belongsTo(User::class, 'comprador');
  }

  public function vendedor()
  {
    return $this->belongsTo(User::class, 'quien_vendio');
  }



}
