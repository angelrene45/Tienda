@extends('layouts.app')

@section('content')
		<h1 class="text-center labeltitle2">Carrito de compras</h1>
	  <div class="tabla-carrito">
		@if(!empty($carrito))

		<p class="text-center">
			<a href="{{route('carrito.cotizacion')}}" class="btn btn-default">
				<span class="glyphicon glyphicon-file" aria-hidden="true"></span>Generar cotización
			</a>
		</p>

<!--Tabla MXN-->
		<div class="table-responsive
				@if($totalMXN == 0.0)
					hidden
				@endif
				">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Código</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Quitar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carrito as $item)
						@if($item->moneda == "MXN")
							<tr>
								<td>
									@if($item->imagen == NULL)
										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/image-unavailable.png"  alt="">
									@else
										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/productos/{{$item->imagen->imagen}}"  alt="">
									@endif
								</td>
								<td>{{$item->codigo}}</td>
								<td>{{str_limit($item->descripcion, '15')}}</td>
								<td>${{number_format($item->precio,2)}} {{$item->moneda}}</td>
								<td>
									<input type="number"
											min="1"
											max="100"
											value="{{$item->cantidad}}"
											id="producto_{{$item->id}}"
											name=""
									>
									<a href=""
										class="btn btn-default btn-update-item"
										data-href="{{route('carrito.actualizar' , $item->slug)}}"
										data-id="{{$item->id}}"
									>
										<i class="glyphicon glyphicon-refresh"></i>
									</a>
								</td>
								<td>${{number_format($item->precio*$item->cantidad,2)}} MXN</td>
								<td>
									<a href="{{route('carrito.eliminar', $item->slug)}}" class="btn btn-danger">
										<i class="glyphicon glyphicon-remove"></i>
									</a>
								</td>
							</tr>
						@endif
					@endforeach
					<tr>
			      <td class="text-right" colspan="7"><h5>Total: ${{number_format($totalMXN,2)}} MXN</h5></td>
			    </tr>
				</tbody>
			</table>


		</div>
<!--Fin de Tabla MXN -->

<!--Tabla USD-->
		<div class="table-responsive
				@if($totalUSD == 0.0)
					hidden
				@endif
				">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Código</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Quitar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carrito as $item)
						@if($item->moneda == "USD")
							<tr>
								<td>
									@if($item->imagen == NULL)
										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/image-unavailable.png"  alt="">
									@else
										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/productos/{{$item->imagen->imagen}}"  alt="">
									@endif
								</td>
								<td>{{$item->codigo}}</td>
								<td>{{str_limit($item->descripcion, '15')}}</td>
								<td>${{number_format($item->precio,2)}} {{$item->moneda}}</td>
								<td>
									<input type="number"
											min="1"
											max="100"
											value="{{$item->cantidad}}"
											id="producto_{{$item->id}}"
											name=""
									>
									<a href=""
										class="btn btn-default btn-update-item"
										data-href="{{route('carrito.actualizar' , $item->slug)}}"
										data-id="{{$item->id}}"
									>
										<i class="glyphicon glyphicon-refresh"></i>
									</a>
								</td>
								<td>${{number_format($item->precio*$item->cantidad,2)}} USD</td>
								<td>
									<a href="{{route('carrito.eliminar', $item->slug)}}" class="btn btn-danger">
										<i class="glyphicon glyphicon-remove"></i>
									</a>
								</td>
							</tr>
						@endif
					@endforeach
					<tr>
			      <td class="text-right" colspan="7"><h5>Total: ${{number_format($totalUSD,2)}} USD</h5></td>
			    </tr>
				</tbody>
			</table>

			<!--
			<h3 class="text-right">
				<span class="label label-success">
					Total: ${{number_format($totalUSD,2)}} USD
				</span>
			</h3>
			 -->


		</div>
<!--Fin de Tabla USD -->

		<p class="text-center">
			<a href="{{route ('carrito.limpiar')}}" class="btn btn-danger btn-clean-car">
			 	Vaciar carrito <i class="glyphicon glyphicon-trash"></i>
			</a>
		</p>

		@else
			<h3 class="text-center"><span class="labeltitle2">No hay productos en el carrito</span></h3>
		@endif



		<hr>
		<p class="text-center">
			<a href="{{route('inicio')}}" class="btn btn-primary">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Seguir comprando
			</a>
			<a href="{{route('orden.solicitud')}}" class="btn btn-primary">Continuar
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</a>
		</p>
	  </div>
@endsection


@section('scripts')
<script>
  $(".btn-clean-car").click(function(){
      return confirm("Estas seguro de eliminar todo el carrito de compras?");
  });
</script>
@endsection
