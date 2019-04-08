  @extends('layouts.app')

  @section('productos')
    active
  @endsection

  @section('content')


    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Productos</div>
        <div class="panel-body">

      
           <a class="btn btn-primary" href="{{route('products.create')}}" role="button">
              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true">          
              </span>        
            </a>

     
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Tallas</th>
              <th>Acción</th>
              <th>PDF</th>
            </tr>
          </thead>
          <tbody>
          @foreach($productos as $producto)
            <tr>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->descripcion}}</td>
              <td>{{$producto->precio}}</td>
              <td>{{$producto->categoria->nombre}}</td>
              <td>{{$producto->stock}}</td>
              <td>
                @foreach($producto->tallas as $talla)
                  | {{$talla->talla}} |
                @endforeach
              </td>
              <td>

              
              <a href="{{ route('products.destroy' , $producto->id  ) }}" class="glyphicon glyphicon-remove-circle btn btn-danger"></a>



              <a href="{{route('products.edit' , ['id' => $producto->id ] )}}" class="glyphicon glyphicon-pencil btn btn-warning">
              </a>

              </td>

              <td>
                <a class="btn btn-danger" href="{{route('producto.pdf',['producto' => $producto->id]) }}" role="button">
                  <span class="glyphicon glyphicon-file" aria-hidden="true"> PDF          
                  </span>        
                </a>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>


        <center>
          {{ $productos->links() }} 
        </center>
      </div>
        

        </div>
          
        </div> 


      </div>
     </div>
    </div><!-- /.container -->

@endsection




