@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Usuario editado correctamente
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> Editar   </div>
        <div class="card-body">
          <form method="POST" action="{{ route('User.update', $usuario->id) }}">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre: </label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido Paterno: </label>
              <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $usuario->lastname }}"  autocomplete="lastname" autofocus>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="second_lastname" class="col-md-4 col-form-label text-md-right">Apellido Materno: </label>
              <div class="col-md-6">
                <input id="second_lastname" type="text" class="form-control @error('second_lastname') is-invalid @enderror" name="second_lastname" value="{{ $usuario->second_lastname }}"  autocomplete="second_lastname" autofocus>
                @error('second_lastname')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>
              <div class="col-md-6">
                <select class="form-control @error('sexo') is-invalid @enderror" name="sexo"  name="email">
                  <option value="1" @if ($usuario->sexo == 1) selected @endif>Masculino</option>
                  <option value="2" @if ($usuario->sexo == 2) selected @endif>Femenino</option>
                </select>
                @error('sexo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email}}"  autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <a href="{{route('User.index')}}" >Regresar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
