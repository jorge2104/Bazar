@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Stock actualizado
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
        <div class="card-header">Asignar precio</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Aproductos.consignar', $producto->id)}}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="precio_vendido" class="col-md-4 col-form-label text-md-right">Asignar precio: </label>
              <div class="col-md-6">
                <input type="number" name="precio_vendido" class="form-control" id="precio_vendido" value="{{$producto->precio_propuesto}}" min="{{$producto->precio_propuesto}}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Aproductos.index')}}" class="btn btn-secondary"> Volver </a>
                <button type="submit" class="btn btn-primary"> Guardar </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
