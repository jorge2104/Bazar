@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Producto Agregado Correctamente
</div>
@endif
@if(Session::has('eliminado'))
<div class="alert alert-success" role="alert">
  Producto Eliminado Correctamente
</div>
@endif
@if(Session::has('fotoDeleted'))
<div class="alert alert-success" role="alert">
  Foto Eliminada Correctamente
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
        <div class="card-header">Productos Propuestos <a href="{{route('home')}}" class="btn btn-info">Volver</a></div>
        <div class="card-body">
          <div class="row">
            @foreach($productos as $producto)
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div id="#carouselExampleControls-{{$producto->id}}" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    @foreach($producto->fotos as $foto)
                    <div class="carousel-item @if($loop->first) active @endif">
                      <img class="d-block w-100" src="{{asset($foto->path)}}" alt="First slide">
                    </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{$producto->descripcion}}</h5>
                  <p class="card-text">
                    Precio propuesto:   ${{$producto->precio_propuesto}}<br>
                    Disponible:{{$producto->disponibles}}<br>
                  </p>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <a href="{{route('Productos.destroy', $producto->id)}}" class="btn btn-warning">Eliminar</a>
                      <a href="{{route('Productos.edit', $producto->id)}}" class="btn btn-primary">Editar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
