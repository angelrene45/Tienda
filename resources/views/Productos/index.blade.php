  @extends('layouts.app')

  @section('productos')
    active
  @endsection

  @section('content')

      @if(count($errors) > 0)
        <div class="alert alert-danger">
          Error en la validación del archivo
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Productos</div>
          <div class="panel-body">

          <div class="col-md-8">
            <a class="btn btn-primary" href="{{route('products.create')}}" role="button">
               <span class="glyphicon glyphicon-plus-sign" aria-hidden="true">
               </span>
             </a>
          </div>

        <div class="col-md-4">
          <form action="{{route('products.index')}}" method="get">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar por codigo o Nombre...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </div><!-- /input-group -->
            </form>
        </div>

        <div class="col-md-6">
          <form  class="form-inline" method="post" enctype="multipart/form-data" action="{{route('productos.importExcel')}}">
            {{csrf_field()}}
            <div class="form-group">
             <input type="file" name="excel_data" id="excel_data">
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="button"><span class="glyphicon glyphicon-upload"></span> Subir</button>
            </div>
          </form>
        </div>

    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Moneda</th>
              <th>Categoria</th>
              <th>Stock</th>
              <th>Acción</th>
              <th>PDF</th>
            </tr>
          </thead>
          <tbody>
          @foreach($productos as $producto)
            <tr>
              <td>{{$producto->codigo}}</td>
              <td>{{$producto->nombre}}</td>
              <td>{{str_limit($producto->descripcion, '15')}}</td>
              <td>{{$producto->precio}}</td>
              <td>{{$producto->moneda}}</td>
              <td>{{$producto->categoria->nombre}}</td>
              <td>{{$producto->stock}}</td>
              <td>

              <a href="{{ route('products.destroy' , $producto->id  ) }}" class="btn-remove-product glyphicon glyphicon-remove-circle btn btn-danger"></a>

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
          {{ $productos->appends(['search'=>$search])->links() }}
        </center>
      </div>
    </div>


    </div>

    </div>


      </div>
     </div>

@endsection

@section('scripts')
<script>
  $(".btn-remove-product").click(function(){
      return confirm("Estas seguro de eliminar el producto?");
  });
</script>
@endsection
