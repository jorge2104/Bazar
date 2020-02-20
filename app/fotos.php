<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\productos;
use App\User;
class fotos extends Model
{
  public function producto()
  {
    return $this->belongsTo(productos::class, 'producto_id');
  }

  public function subida_por()
  {
    return $this->belongsTo(User::class, 'subida_por');
  }
}
