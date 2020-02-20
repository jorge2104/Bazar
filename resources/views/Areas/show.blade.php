@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Area Editada Correctamente
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar Area</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Areas.actualizar', $area->id) }}">
            @csrf
            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre: </label>
              <div class="col-md-6">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$area->nombre}}" required autocomplete="nombre" autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion: </label>
              <div class="col-md-6">
                <textarea name="descripcion" class="form-control" id="descripcion"> {{$area->descripcion}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Areas.index')}}" class="btn btn-secondary"> Volver </a>
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
