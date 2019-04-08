@extends('layouts.app')

@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="glyphicon glyphicon-shopping-cart"></i> Carrito de compras</h1>
		</div>
	  <div class="tabla-carrito">
		@if(count($carrito))

		<p>
			<a href="{{route ('carrito.limpiar')}}" class="btn btn-danger">
				Limpiar carrito <i class="glyphicon glyphicon-trash"></i>
			</a>
		</p>

		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Producto</th>
						<th>Talla</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th>Quitar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carrito as $item)
						<tr>
							<td><img src="{{ URL::to('/') }}/images/productos/{{$item->imagen->imagen}}"></td>
							<td>{{$item->nombre}}</td>
							<td>{{$item->talla}}</td>
							<td>{{number_format($item->precio,2)}}</td>
							<td>
								<input type="number" 
										min="1" 
										max="100"  
										value="{{$item->cantidad}}" 
										id="producto_{{$item->id}}" 
										name=""
								>
								<a href="" 
									class="btn btn-warning btn-update-item"
									data-href="{{route('carrito.actualizar' , $item->slug)}}"
									data-id="{{$item->id}}"
								>
									<i class="glyphicon glyphicon-refresh"></i>
								</a>	
							</td>
							<td>{{number_format($item->precio*$item->cantidad,2)}}</td>
							<td>
								<a href="{{route('carrito.eliminar', $item->slug)}}" class="btn btn-danger">
									<i class="glyphicon glyphicon-remove"></i>
								</a> 
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<h3>
				<span class="label label-success">
					Total: ${{number_format($total,2)}}
				</span>
			</h3>

		</div>
		@else
			<h3><span class="label label-warning">No hay productos en el carrito :(</span></h3>
		@endif
		<hr>
		<p>
			<a href="{{route('inicio')}}" class="btn btn-primary">
				<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Seguir comprando
			</a>
			<a href="{{route('orden.detalle')}}" class="btn btn-primary">Continuar
				<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
			</a>
		</p>
	  </div>
	</div>
@endsection