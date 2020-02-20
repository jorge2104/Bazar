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
            @foreach($compras as $compra)
            <div class="col-md-4 p-2">
              <div class="card">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Producto: {{$compra->producto->descripcion}}</li>
                  <li class="list-group-item">Precio de venta: {{$compra->precio_venta}} </li>
                  <li class="list-group-item">Comprador: {{$compra->quien_compra->name}}</li>
                  <li class="list-group-item">Fecha: {{$compra->fecha}}</li>
                  <li class="list-group-item">pagado: @if($compra->pago == $compra->precio_venta )  PAGADO @else Restante: {{$compra->precio_venta-$compra->pago}} @endif </li>
                  @if($compra->pago != $compra->precio_venta )
                  <li class="list-group-item text-center">
                    <a href="{{route('Pagos.create', $compra->id)}}">hacer pago</a>
                  </li>
                  @endif
                </ul>
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
