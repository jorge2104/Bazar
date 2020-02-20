@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Foto editada Correctamente
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
        <div class="card-header">Editar imagen</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Fotos.actualizar', $foto->id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="fotos" class="col-md-4 col-form-label text-md-right">Fotos: </label>
              <div class="col-md-6">
                <input type="file" name="fotos" class="form-control" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Productos.edit', $foto->producto_id )}}" class="btn btn-secondary"> Volver </a>
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
