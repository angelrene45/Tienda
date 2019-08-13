<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Producto</title>
  <link rel="stylesheet" type="text/css" href="css/estiloPdf.css">
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('css/estiloPdf.css')}}">-->
</head>
<body>

      <div>
        <img src="{{public_path('images/shel-logo.png')}}"  width="300px" alt="Shel">
      </div>

      <div>
        <h2>{{$producto->codigo}}</h2>
      </div>

      <div>
        @if($producto->imagen != NULL)
          <img src="{{public_path('images/productos/')}}{{$producto->imagen->imagen}}" alt="BTS" width="430" height="450">
        @endif
      </div>
      <br>
      <div>
        {{$producto->nombre}}
      </div>

      <div class="info">
        <p align="center">Precio: ${{$producto->precio}} {{$producto->moneda}}</p>
        <p class="smalltext">
          {!! $producto->descripcion !!}
        </p>
      </div>


</body>
</html>
