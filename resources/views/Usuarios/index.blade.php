@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Usuarios <a href="{{route('home')}}" class="btn btn-info">Regresar</a></div>
        <div class="card-body">
          @foreach($usuarios as $usuario)
          <div class="row p-3">
            <div class="col-md-4">
              {{$usuario->name}} {{$usuario->lastname}} {{$usuario->second_lastname}}
            </div>
            <div class="col-md-4">
              <a href="{{route('User.edit', $usuario->id)}}" class="btn btn-warning">Cambiar contraseña</a>
              <a href="{{route('User.show', $usuario->id)}}">Editar datos de usuario</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
