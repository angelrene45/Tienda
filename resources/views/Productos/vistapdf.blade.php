<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Producto</title>
  <link rel="stylesheet" type="text/css" href="css/estiloPdf.css">
</head>
<body>
     
      <div>
        <hr size="10">
        <h1 align="center">Tienda online</h1>
      </div>

      <div>
        <h2>{{$producto->nombre}}</h2>
      </div>
      
      <div>
        <img src="{{ URL::to('/') }}/images/productos/{{$producto->imagen->imagen}}" width="430" height="450">
      </div>

      <div class="info">
        <p align="center">Precio: ${{$producto->precio}}</p>
        <p align="center">Tallas:
        @foreach($producto->tallas as $talla)
            | {{$talla->talla}} |
        @endforeach 
        </p>
        <p>
          Descripcion del producto: {{$producto->descripcion}}
        </p>
        <p>
          Disponibilidad: {{$producto->stock}}
        </p>
      </div>



    <hr size="10">
</body>
</html>
               
