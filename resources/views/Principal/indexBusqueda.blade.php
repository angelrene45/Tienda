@extends('layouts.app')

@section('content')

        <!-- Page Header -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header text-center labeltitle2">
                  Búsqueda del producto
                </h1>
            </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-body center-block">

            <form class="form-horizontal" action="{{route('producto.busqueda')}}" method="GET" role="form" autocomplete="off" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                <label class="control-label col-sm-offset-2 col-sm-2" for="email">Buscar por:</label>
                <div class="col-sm-4">
                  <select class="form-control chosen-select2" id="Filtro" name="Filtro">
                      <option value="codigo">codigo</option>
                      <option value="descripcion">descripcion</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-offset-2 col-sm-2" for="pwd">Texto:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="Texto" name="Texto">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <button type="submit" class="btn btn-default">Buscar</button>
                </div>
              </div>
            </form>

          </div>
        </div>




@endsection

@section('scripts')
  <!--script para la animacion del select tallas-->
        <script>
        $(".chosen-select2").chosen({
          no_results_text: "Oops, no se econtro esa categoria!"
        });

        </script>
@endsection
