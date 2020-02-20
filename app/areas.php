<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\productos;
class areas extends Model
{
  public function productos()
  {
    return $this->hasMany(productos::class, 'area');
  }
}
