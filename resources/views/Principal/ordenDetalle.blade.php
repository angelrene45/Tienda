@extends('layouts.app')

@section('content')
<form action="{{route('orden.finalizar')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
	{{ csrf_field() }}
		<div class="text-center">
			<div class="page-header col-md-12">
				<h1 class="labeltitle2"><i class="glyphicon glyphicon-shopping-cart"></i> Detalle del pedido</h1>
			</div>

			<div class="col-md-12">
				<p class="text-center">
					<a href="{{route('carrito.cotizacion')}}" class="btn btn-default">
						<span class="glyphicon glyphicon-file" aria-hidden="true"></span>Generar cotización
					</a>
				</p>
			</div>


			<div class="row">
				<div class="
						@if(Auth::user()->type == "purchaser")
							col-md-offset-3
						@endif col-md-6">
					<div class="table-responsive">
						<h3 class="labeltitle2">Datos del usuario</h3>
						<table class="table table table-striped table-hover table-bordered">
							<tr><td>Nombre:</td><td>{{Auth::user()->name}}</td></tr>
							<tr><td>Correo:</td><td>{{Auth::user()->email}}</td></tr>
						</table>
					</div>
				</div>

				@if(Auth::user()->type != "purchaser")
					<div class="col-md-6">
						<div class="table-responsive">
							<h3 class="labeltitle2">Datos del comprador</h3>
							<input type="hidden" id="compradorid" name="compradorid" value="{{$comprador->id}}">
							<input type="hidden" id="compradoremail" name="compradoremail" value="{{$comprador->email}}">
							<table class="table table table-striped table-hover table-bordered">
								<tr><td>Nombre:</td><td>{{$comprador->name}}</td></tr>
								<tr><td>Correo:</td><td>{{$comprador->email}}</td></tr>
							</table>
						</div>
					</div>
				@endif
				<div class="col-md-12">
					<div class="table-responsive">
						<h3 class="labeltitle2">Dirección</h3>
						<input type="hidden" id="direccionid" name="direccionid" value="{{$direccion->id}}">
						<table class="table table table-striped table-hover table-bordered">
							<tr><td>{{$direccion->calle}}, {{$direccion->colonia}}, {{$direccion->estado}}, {{$direccion->municipio}}, {{$direccion->codigo_postal}}</td></tr>
						</table>
					</div>
				</div>

				<!--Table MXN-->
				<div class="table-responsive col-md-12">
					<h3 class="labeltitle2">Datos del pedido</h3>
					<table class="table table-striped table-hover table-bordered
					@if($totalMXN == 0.0)
						hidden
					@endif
					">
						<tr>
							<th>Producto</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>
						</tr>

						@foreach($carrito as $item)
								@if($item->moneda == "MXN")
									<tr>
										<td>{{$item->nombre}}</td>
										<td>${{number_format($item->precio,2)}} <span class="small">MXN</span></td>
										<td>{{$item->cantidad}}</td>
										<td>${{number_format($item->precio * $item->cantidad,2)}} <span class="small">MXN</span></td>
									</tr>
								@endif
						@endforeach
							<tr>
								<td class="text-right" colspan="7"><h5>Total: ${{number_format($totalMXN,2)}} <span class="small">MXN</span></h5></td>
							</tr>
					</table>
				</div>
					<!--fIN Table MXN-->

					<!--Table USD-->
					<div class="table-responsive col-md-12">

						<table class="table table-striped table-hover table-bordered table-responsive
						@if($totalUSD == 0.0)
							hidden
						@endif
						">
							<tr>
								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
							</tr>

							@foreach($carrito as $item)
									@if($item->moneda == "USD")
										<tr>
											<td>{{$item->nombre}}</td>
											<td>${{number_format($item->precio,2)}} <span class="small">USD</span></td>
											<td>{{$item->cantidad}}</td>
											<td>${{number_format($item->precio * $item->cantidad,2)}} <span class="small">USD</span></td>
										</tr>
									@endif
							@endforeach
									<tr>
										<td class="text-right" colspan="7"><h5>Total: ${{number_format($totalUSD,2)}} <span class="small">USD</span></h5></td>
									</tr>
						</table>
					</div>
					<!--FIN Table USD-->


				<hr>
					<div class="col-md-12">
						<p>
							<a href="{{route('orden.solicitud')}}" class="btn btn-primary">
								<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Regresar
							</a>
							<button type="submit" class="btn btn-primary btn-continue-car">Realizar pedido <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
						</p>
					</div>

				</div>
			</div>
		</form>
@endsection
