@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Producto Editado Correctamente
</div>
@endif
@if(Session::has('errors'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  @foreach ($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Proponer producto</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Productos.actualizar', $producto->id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion: </label>
              <div class="col-md-6">
                <textarea name="descripcion" class="form-control" id="descripcion">{{$producto->descripcion}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="area" class="col-md-4 col-form-label text-md-right">Area: </label>
              <div class="col-md-6">
                <select class="form-control" name="area">
                  @foreach($areas as $area)
                  <option value="{{$area->id}}" @if($producto->area == $area->id) selected @endif>{{$area->nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="disponibles" class="col-md-4 col-form-label text-md-right">Disponibles: </label>
              <div class="col-md-6">
                <input type="number" name="disponibles" class="form-control" id="disponibles" value="{{$producto->disponibles}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="precio_propuesto" class="col-md-4 col-form-label text-md-right" >Precio: </label>
              <div class="col-md-6">
                <input type="number" name="precio_propuesto" class="form-control" id="precio" value="{{$producto->precio_propuesto}}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Productos.index')}}" class="btn btn-secondary"> Volver </a>
                <button type="submit" class="btn btn-primary"> Guardar </button>
              </div>
            </div>
          </form>
          @foreach($producto->fotos as $foto)
          <div class="row p-3">
            <div class="col-md-6">
              <img src="{{asset($foto->path)}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
              <a href="{{route('Fotos.edit', $foto->id)}}">Editar</a>
              <a href="{{route('Fotos.destroy', $foto->id)}}">Eliminar</a>
            </div>
          </div>
          @endforeach
          <div class="row text-center">
            <a href="{{route('Fotos.create', $producto->id )}}" class="btn btn-outline-success m-auto">Agregar imagenes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
