
 @extends('layouts.app')


  @section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Categorias</div>
        <div class="panel-body">
          <a class="btn btn-primary" href="{{route('categorias.create')}}" role="button"> Nueva Categoria
          </a>
        </div>

        <!-- Table -->

        <div class="table-responsive">
        <table class="table table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          @foreach($categorias as $categoria)
            <tr>
              <td>{{$categoria->id}}</td>
              <td>{{$categoria->nombre}}</td>

              <td>

              <a href="{{ route('categorias.destroy' , ['id' => $categoria->id ] ) }}" class="glyphicon glyphicon-remove-circle btn btn-danger" ></a>

              <a href="{{route('categorias.edit' , $categoria->id )}}" class="glyphicon glyphicon-pencil btn btn-warning"></a>

              </td>
            </tr>
           @endforeach
          </tbody>
        </table>

    <center>
      {{ $categorias->links() }}
    </center>


      </div>

      </div>

   </div>
 </div>



  @endsection
