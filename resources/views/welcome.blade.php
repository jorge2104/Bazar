<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title> Bazar - inicio </title>
  <style media="screen">
  .flex{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  </style>
</head>
<body>
  <section class="navigation">
    <div class="container-fluid m-0 p-0">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="{{ route('index') }}">INICIO</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto ">
              @guest
              <li class="nav-item" style="color: #fff;">
                <a href="{{route('login')}}" style="color: #fff;">Iniciar Sesion</a> / <a href="{{route('register')}}" style="color: #fff;">Registrarse</a>
              </li>
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('home')}}">panel de control</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>

              @endguest
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>
  @if(Session::has('ok'))
  <div class="alert alert-success" role="alert">
    Compra realizada con exito
  </div>
  @endif
  @foreach($areas as $area)
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{$area->nombre}}, {{$area->descripcion}}</div>
          <div class="card-body">
            <div class="row">
              @foreach($area->productos as $producto)
              <div class="col-md-4">
                <div class="card" >
                  <div id="carouselExampleControls-{{$producto->id}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      @foreach($producto->fotos as $foto)
                      <div class="carousel-item @if($loop->first) active @endif">
                        <img class="d-block w-100" src="{{asset($foto->path)}}" alt="First slide">
                      </div>
                      @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls-{{$producto->id}}" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{$producto->descripcion}}</h5>
                    <p class="card-text">
                      Precio:   ${{$producto->precio_vendido}}<br>
                      Disponible:{{$producto->disponibles}}<br>
                    </p>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        @guest
                        <a href="{{route('register')}}" class="btn btn-warning">Comprar</a>
                        @else
                        <a href="{{route('Ventas.show', $producto->id) }}" class="btn btn-info">Comprar</a>
                        @endguest
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach








  <section class="js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </section>
</body>
</html>
