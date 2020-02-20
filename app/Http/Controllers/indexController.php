<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areas;

class indexController extends Controller
{
  public function index()
  {
    $areas = areas::with(array('productos'=> function($query){
      $query->where('consignado', '=', 1)->where('disponibles', '>' , 0)->get();
    }))->get();

    return view('welcome', compact('areas'));
  }
}
