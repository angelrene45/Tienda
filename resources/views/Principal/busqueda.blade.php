@extends('layouts.app')

@section('content')


                <h1 class="page-header labeltitle text-center">Productos
                    <small class="labelstock">{{$palabra}}</small>
                </h1>

        <!-- /.row -->

        @if(count($productos) > 0)

          @foreach($productos as $producto)
          <form method="POST" action="{{route('carrito.add' , $producto->slug)}}">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <div class="row imgindex" >
            <div class="col-sm-3 col-md-3">


                <a href="{{route('producto.descripcion',['id' => $producto->id , 'slug' => $producto->slug])}}">
                  @if(count($producto->imagenes)==0)
                    <img class="center-block" height="180px" width="200px" src="{{ URL::to('/') }}/images/image-unavailable.png"   alt="">
                  @else
                    @foreach($producto->imagenes as $imagen)
                      <img class="center-block" height="180px" width="200px" src="{{ URL::to('/') }}/images/productos/{{$imagen->imagen}}"   alt="">
                      @break
                    @endforeach
                  @endif
                </a>
             </div>

             <h3 class="labeltitle center-block">{{$producto->nombre}}</h3>
             <span class="labelstock center-block hidden">Existencia: {{$producto->stock}}</span>
             <br>

             <div class="col-sm-9 col-md-9">
                <table class="table table-condensed">
                  <tr>
                    <th>Codigo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>{{$producto->codigo}}</td>
                    <td>${{number_format($producto->precio,2)}}
                      <span class="label
                        @if($producto->moneda == "MXN")
                          label-success
                        @elseif($producto->moneda == "USD")
                          label-danger
                        @else
                          label-info
                        @endif
                        ">{{$producto->moneda}}
                      </span>
                      <input class="hidden" type="text" name="moneda" id="moneda" value="{{$producto->moneda}}">
                    </td>
                    <td><input id="cantidad" name="cantidad" type="number" value="1" min="1" max="10000"></td>
                    <td>
                      <button type="submit" class="btn btn-default btn-add-car"><i class="glyphicon glyphicon-shopping-cart"></i> Añadir al carrito</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
          <br><br>
          @endforeach

		<!-- Pagination -->
        <center>
      	{{ $productos->links() }}
    	</center>


        <hr>

        @else

         <h2 class="labeltitle text-center">No se encontro ningun producto</h2>

@endif


@endsection

@section('scripts')
<script src=" {{ asset('js/funcionesajax.js') }}"></script>
@endsection