@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Ventas</div>
        <div class="card-body">
          <div class="row p-3">
            @foreach($ventas as $venta)
            <div class="col-md-4 p-2">
              <div class="card">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Producto: {{$venta->producto->descripcion}}</li>
                  <li class="list-group-item">Precio de venta: {{$venta->precio_venta}} </li>
                  <li class="list-group-item">Comprador: {{$venta->quien_compra->name}}</li>
                  <li class="list-group-item">Fecha: {{$venta->fecha}}</li>
                  <li class="list-group-item text-center">@if($venta->pago == $venta->precio_venta) PAGADO @else Restante: {{$venta->precio_venta-$venta->pago}} @endif</li>
                  <li class="list-group-item text-center">  <a href="{{route('Pagos.show', $venta->id)}}">Ver pagos</a> </li>
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
