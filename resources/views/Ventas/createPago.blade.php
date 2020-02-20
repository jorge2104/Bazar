@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Hacer pago</div>
        <div class="card-body">
          <form method="POST" action="{{ route('Pagos.storePago', $compra->id)}}" >
            @csrf
            <div class="form-group row">
              <label for="monto" class="col-md-4 col-form-label text-md-right">Cantidad: </label>
              <div class="col-md-6">
                <input type="number" name="monto" class="form-control" id="monto" required max="{{ $compra->precio_venta-$compra->pago }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 text-right">
                <a href="{{route('Compras.index')}}" class="btn btn-secondary"> Volver </a>
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
