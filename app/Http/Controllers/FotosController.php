<?php

namespace App\Http\Controllers;

use App\fotos;
use Auth;
use Illuminate\Http\Request;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      return view('Fotos.create', compact('id'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
      $request->validate([
        'fotos[]' => 'image|mimes:jpg, png, bmp, jpeg',
      ]);
      if ($request->hasFile('fotos')) {
        foreach ($request->fotos as $foto) {
          $nfoto  = new fotos;
          $nfoto->producto_id = $id;
          $nfoto->path = $foto->store('imagenes');
          $nfoto->subida_por = Auth::user()->id;
          $nfoto->save();
        }
      }
      return redirect()->back()->with('ok', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function show(fotos $fotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $foto= fotos::findOrFail($id);
      return view('Fotos.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

      $request->validate([
            'fotos' => 'image|mimes:jpg, png, bmp, jpeg',
          ]);
      if ($request->hasFile('fotos')){
        $foto= fotos::findOrFail($id);
        unlink($foto->path);
        $foto->path = $request->fotos->store('imagenes');
        $foto->save();
        return redirect()->back()->with('ok', 'ok');
      }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fotos  $fotos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $foto= fotos::findOrFail($id);
      unlink($foto->path);
      $foto->delete();
      return redirect()->back()->with('fotoDeleted', 'fotoDeleted');
    }
}
