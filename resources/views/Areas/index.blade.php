@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Area eliminada Correctamente
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
  Esta area no se puede eliminar
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              Ver areas
            </div>
            <div class="col-md-6 text-right">
              <a href="{{route('home')}}" class="btn btn-info m-auto">panel de control</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          @foreach($areas as $area)
          <div class="row p-2">
            <div class="col-md-4 text-center">
              {{$area->nombre}}
            </div>
            <div class="col-md-4 text-center">
              <a href="{{route('Areas.show', $area->id)}}" class="btn btn-primary">Editar</a>
            </div>
            <div class="col-md-4 text-center">
              <a href="{{route('Areas.destroy', $area->id)}}" class="btn btn-danger">Eliminar</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
