<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class roles extends Model
{
  public function fotos()
  {
    return $this->belongsTo(User::class);
  }
}
