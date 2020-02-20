@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Panel de control</div>
        <div class="card-body">
          @if(Auth::user()->id_role == 1)
          <div class="row">
            <div class="col-md-6">
              <a href="{{route('Areas.create')}}">Añadir area</a>
            </div>
            <div class="col-md-6">
              <a href="{{route('Areas.index')}}">ver areas</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <a href="{{route('User.index')}}" class="">Ver usuarios</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <a href="{{route('Aproductos.index')}}" class="">Ver productos</a>
            </div>
          </div>

          <div class="row ml-auto">
            <a href="{{route('Aventas.index')}}">Ver ventas</a>
          </div>

          @else
          <div class="row ml-auto">
            <a href="{{route('Productos.create')}}">Añadir Producto</a>
          </div>
          <div class="row ml-auto">
            <a href="{{route('Productos.index')}}">Ver productos propuestos</a>
          </div>
          <div class="row ml-auto">
            <a href="{{route('Consigandos.index')}}">Ver productos consignados</a>
          </div>
          <div class="row ml-auto">
            <a href="{{route('Ventas.index')}}">Ver ventas</a>
          </div>
          <div class="row ml-auto">
            <a href="{{route('Compras.index')}}">Ver compras</a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
