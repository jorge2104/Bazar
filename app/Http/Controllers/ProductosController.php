<?php

namespace App\Http\Controllers;

use App\productos;
use App\areas;
use Auth;
use App\fotos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos = productos::where('consignado', '0')
      ->where('clienta_vende', Auth::user()->id)->with('fotos')->get();
      return view('Productos.index', compact('productos'));
    }

    public function Aproductos()
    {
      $areas = areas::with('productos')->get();
      return view('Aproductos.index', compact('areas'));
    }
    public function consignar($id)
    {
      $producto = productos::findOrFail($id);
      return view('Aproductos.price', compact('producto'));
    }
    public function storeConsigna($id, Request $request)
    {
      $producto = productos::findOrFail($id);
      $producto->precio_vendido = $request->precio_vendido;
      $producto->consignado = 1;
      $producto->save();
      return redirect()->route('Aproductos.index')->with('consignado', 'consignado');

    }

    public function deleteConsigna($id)
    {
      $producto = productos::findOrFail($id);
      $producto->consignado = 0;
      $producto->save();
      return redirect()->route('Aproductos.index')->with('nconsignado', 'nconsignado');
    }


    public function consignados()
    {
      $productos = productos::where('consignado', '1')->where('disponibles', '>', '0')
      ->where('clienta_vende', Auth::user()->id)->with('fotos')->get();
      return view('Productos.consignados', compact('productos'));
    }

    public function consignadoStock($id)
    {
      $producto = productos::findOrFail($id);
      return view('productos.consignadostock', compact('producto'));
    }

    public function consignadoStockStore($id, Request $request)
    {
      $producto = productos::findOrFail($id);
      $producto->disponibles = $request->disponibles;
      $producto ->save();

      return redirect()->back()->with('ok', 'ok');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $areas = areas::all();
      return view('Productos.create', compact('areas'));
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
        'descripcion' => 'required|string',
        'area' => 'required',
        'fotos[]' => 'image|mimes:jpg, png, bmp, jpeg',
        'disponibles' => 'required|integer',
      ]);

      $producto = new productos;
      $producto->descripcion  = $request->descripcion;
      $producto->precio_propuesto = $request->precio_propuesto;
      $producto->precio_vendido = 0;
      $producto->consignado = 0 ;
      $producto->clienta_vende = Auth::user()->id;
      $producto->area = $request->area;
      $producto->disponibles = $request->disponibles;
      $producto ->save();

      if ($request->hasFile('fotos')) {
        foreach ($request->fotos as $foto) {
          $nfoto  = new fotos;
          $nfoto->producto_id = $producto->id;
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
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $producto = productos::findOrFail($id);
      $areas = areas::all();
      return view('productos.edit', compact('producto', 'areas')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $producto  = productos::findOrFail($id);
      $producto->descripcion  = $request->descripcion;
      $producto->precio_propuesto = $request->precio_propuesto;
      $producto->area = $request->area;
      $producto->disponibles = $request->disponibles;
      $producto->save();
      return redirect()->back()->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $producto  = productos::where('id', $id)
      ->with('fotos')->first();
      if(isset($producto->fotos)){
        foreach ($producto->fotos as $foto) {
          $foto= fotos::findOrFail($foto->id);
          unlink($foto->path);
          $foto->delete();
        }
      }
      $producto->delete();
      return redirect()->back()->with('eliminado', 'eliminado');
    }

    public function consignadoCreate($id)
    {
      return view('Productos.consignadoEdit', compact('id'));
    }

    public function consignadoDelete($id)
    {
      $producto  = productos::findOrFail($id);
      $producto->disponibles = -99;
      $producto->save() ;

      return redirect()->back()->with('eliminado', 'eliminado');
    }
}
