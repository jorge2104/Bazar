<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\fotos;
use App\productos;
use App\ventas;
use App\roles;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'second_lastname',
        'sexo',
        'id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fotos()
    {
      return $this->hasMany(fotos::class);
    }

    public function ventas()
    {
      return $this->hasMany(ventas::class, 'quien_vendio');
    }

    public function compras()
    {
      return $this->hasMany(ventas::class, 'comprador');
    }

    public function rol()
    {
      return $this->belongsTo(roles::class, 'comprador');
    }

}
