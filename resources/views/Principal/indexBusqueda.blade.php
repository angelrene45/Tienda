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

            <form class="form-horizontal" action="{{route('producto.busqueda')}}" method="GET">
              <div class="form-group">
                <label class="control-label col-sm-offset-2 col-sm-2" for="email">Buscar por:</label>
                <div class="col-sm-4">
                  <select class="form-control select-search" id="Filtro" name="Filtro">
                      <option value="todo">Todos los productos</option>
                      <option value="codigo">Codigo</option>
                      <option value="nombre">Nombre</option>
                      <option value="categoria">Categoria</option>
                  </select>
                </div>
              </div>
              <div class="form-group hidden select-categoria">
                <label class="control-label col-sm-offset-2 col-sm-2">Categoria:</label>
                <div class="col-sm-4">
                  <select class="form-control" id="Categoria" name="Categoria">
                      @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group input-text hidden">
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
        $(".chosen-select3").chosen({
          no_results_text: "Oops, no se econtro esa categoria!"
        });

        $('.select-search').on('change', function() {
          if(this.value == "categoria"){
            $(".select-categoria").removeClass("hidden");
            $(".input-text").addClass("hidden");
          }else if(this.value == "todo"){
              $(".input-text").addClass("hidden");
              $(".select-categoria").addClass("hidden");
          }else{
            $(".select-categoria").addClass("hidden");
            $(".input-text").removeClass("hidden");
          }
        });

        </script>
@endsection
