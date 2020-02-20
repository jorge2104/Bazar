@extends('layouts.app')
@section('content')
@if(Session::has('ok'))
<div class="alert alert-success" role="alert">
  Pago realizado con exito
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">compras</div>
        <div class="card-body">
          <div class="row p-3">
            @foreach($pagos as $pago)
            <div class="col-md-4 p-2">
              <div class="card">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">fecha: {{$pago->pagos->fecha}}</li>
                  <li class="list-group-item">monto: {{$pago->pagos->monto}}</li>
                </ul>
              </div>
            </div>
            @endforeach
            <div class="col-md-12 text-center">
              <a href="{{route('Ventas.index')}}" class="btn btn-info"> Regresar </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
