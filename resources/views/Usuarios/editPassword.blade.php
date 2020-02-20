@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Contraseña cambiada correctamente
</div>
@endif

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Cambiar contraseña</div>
        <div class="card-body">
          <form class="" action="{{route('User.storePass', $id)}}" method="POST">
            @csrf
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contrase­ña</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <a href="{{route('User.index')}}">Volver</a>
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
