@extends('layouts.app')

@section('content')

			<div class="panel panel-default text-center labeltitle2">
				<div class="panel-body">Completar pedido</div>
			</div>


	<form class="form-horizontal" action="{{route('orden.detalle')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
		{{ csrf_field() }}
			<p class="text-center">Seleccione la direccion:</p>
			<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
				<label for="inputDireccion" class="col-sm-4 control-label">Dirección</label>
				<div class="col-sm-4">
					<select class="form-control chosen-select-direccion" id="direccion" name="direccion" select="{{old ('direccion')}}" >
							@foreach($direcciones as $direccion)
											<option value="{{$direccion->id}}">
													Colonia: {{$direccion->colonia}}, Calle: {{$direccion->calle}} {{$direccion->numero_exterior}}, Estado: {{$direccion->estado}}, Municipio: {{$direccion->municipio}}, CP: {{$direccion->codigo_postal}}
											</option>
							@endforeach
					</select>
				</div>
			</div>

			@if(Auth::user()->type != "purchaser")
	      <p class="text-center">Seleccione el comprador que autorizará el pedido:</p>
	        <div class="form-group{{ $errors->has('purchaser') ? ' has-error' : '' }}">
	          <label for="inputComprador" class="col-sm-4 control-label">Comprador</label>
	          <div class="col-sm-4">
	            <select class="form-control chosen-select-purchaser" id="purchaser" name="purchaser" select="{{old ('purchaser')}}" >
	                @foreach($compradores as $comprador)
	                        <option value="{{$comprador->id}}">
	                          {{$comprador->name}}
	                        </option>
	                @endforeach
	            </select>
	        </div>
				</div>

	  		<br>

	      <p class="text-center">Se enviara un correo al comprador que selecciono, una vez que valide su pedido podrá ver el seguimiento o estatus de su orden</p>

			@endif

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
          $(".chosen-select-direccion").chosen({
            no_results_text: "Oops, no se econtro esa direccion!",
          });
          $(".btn-continue-car").click(function(){
              return confirm("¿Estás seguro de continuar con el pedido?");
          });
        </script>
@endsection
