@extends('layouts.app')

@section('content')


			<h1 class="labeltitle2 text-center">Completar pedido</h1><br>

      <p class="text-center">Seleccione el comprador que autorizará el pedido:</p>

      <form class="form-horizontal" action="{{route('orden.detalle')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('Precio') ? ' has-error' : '' }}">
          <label for="inputComprador" class="col-sm-5 control-label">Comprador</label>
          <div class="col-sm-3">
            <select class="form-control chosen-select-purchaser" id="purchaser" name="purchaser" select="{{old ('purchaser')}}" >
                @foreach($compradores as $comprador)
                        <option value="{{$comprador->id}}">
                          {{$comprador->name}}
                        </option>
                @endforeach
            </select>
        </div>

      <br><br>

      <p class="text-center">Se enviara un correo al comprador que selecciono, una vez que valide su pedido podrá ver el seguimiento o estatus de su orden</p>

      <p class="text-center">
        <a href="{{route('carrito.mostrar')}}" class="btn btn-primary">
          <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Regresar
        </a>
         <button type="submit" class="btn btn-primary btn-continue-car">Continuar <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
      </p>

    </form>
@endsection

@section('scripts')
  <!--script para la animacion del select tallas-->
        <script>
          $(".chosen-select-purchaser").chosen({
            no_results_text: "Oops, no se econtro esa categoria!"
          });
          $(".btn-continue-car").click(function(){
              return confirm("¿Estás seguro de continuar con el pedido?");
          });
        </script>
@endsection
