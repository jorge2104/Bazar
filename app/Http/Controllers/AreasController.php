<?php

namespace App\Http\Controllers;

use App\areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
  public function __construct()
  {
      $this->middleware('is_admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas = areas::all();
      return view('Areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
      ]);

      $area = new areas;
      $area->nombre  = $request->nombre;
      $area->descripcion  = $request->descripcion;
      $area->save();

      return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $area = areas::findOrFail($id);
      return view('Areas.show', compact('area'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function edit(areas $areas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $area = areas::findOrFail($id);
      $area->nombre = $request->nombre;
      $area->descripcion = $request->descripcion;
      $area->save();
      return redirect()->back()->with('ok', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $area = areas::findOrFail($id);
      $productos = $area->productos->count();
      if ($productos > 0) {
        return redirect()->back()->with('error', 'error');
      }else{
        $area->delete();
        return redirect()->back()->with('ok', 'ok');
      }

    }
}
