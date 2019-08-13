
 @extends('layouts.app')


  @section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Categorias</div>

        <div class="panel-body">
          <div class="col-md-6">
            <a class="btn btn-primary" href="{{route('categorias.create')}}" role="button"> Nueva Categoria
            </a>
          </div>
          <div class="col-md-6">
            <form  class="form-inline" method="post" enctype="multipart/form-data" action="{{route('categorias.importExcel')}}">
              {{csrf_field()}}
              <div class="form-group">
               <input type="file" name="excel_data" id="excel_data">
              </div>

              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="button"><span class="glyphicon glyphicon-upload"></span> Subir</button>
              </div>
            </form>
          </div>
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
