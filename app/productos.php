<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\fotos;
use App\areas;
use App\User;
use App\ventas;

class productos extends Model
{
    public function fotos()
    {
      return $this->hasMany(fotos::class, 'producto_id');
    }

    public function area()
    {
      return $this->belongsTo(areas::class, 'area');
    }

    public function ventas()
    {
      return $this->hasMany(ventas::class);
    }

    public function cliente_venta()
    {
      return $this->belongsTo(User::class, 'clienta_vende');
    }

}
