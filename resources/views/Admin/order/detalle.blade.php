 @extends('layouts.app')

 @section('content')

 <div class="container text-center">

 <div class="page-header">
  <h1>Detalle del pedido {{$orden[0]->orden_id}} </h1>
</div>

 <div class="table-responsive">
          <table class="table table-stripped table-bordered table-hover" id="table-detalle-pedido">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orden as $detalle)
                <tr>
                        <td>
                          <img src="{{ URL::to('/') }}/images/productos/{{$detalle->producto->imagenes[0]->imagen}}" width="200"> 
                        </td>
                        <td>
                           {{$detalle->producto->nombre}}
                        </td>
                        <td>
                           ${{$detalle->precio}}
                        </td>
                        <td>
                           {{$detalle->cantidad}}
                        </td>
                        <td>
                           ${{$detalle->cantidad * $detalle->precio}}
                        </td>
                <tr>
            @endforeach
            </tbody>  
          </table>
</div>

</div>


@endsection