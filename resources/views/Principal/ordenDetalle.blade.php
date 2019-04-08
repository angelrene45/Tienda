@extends('layouts.app')

@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="glyphicon glyphicon-shopping-cart"></i> Detalle del pedido</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<h3>Datos del usuario</h3>
				<table class="table table table-striped table-hover table-bordered">
					<tr><td>Nombre:</td><td>{{Auth::user()->name}}</td></tr>
					<tr><td>Correo:</td><td>{{Auth::user()->email}}</td></tr>
				</table>
			</div>
			<div class="table-responsive">
				<h3>Datos del pedido</h3>
				<table class="table table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Talla</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>

					@foreach($carrito as $item)
					<tr>
						<td>{{$item->nombre}}</td>
						<td>{{$item->talla}}</td>
						<td>{{number_format($item->precio,2)}}</td>
						<td>{{$item->cantidad}}</td>
						<td>{{number_format($item->precio * $item->cantidad,2)}}</td>
					</tr>
					@endforeach
				</table><hr>
				<h3>
					<span class="label label-success">
						$Total ${{number_format($total,2)}}	
					</span>
				</h3><hr>
				<p>
					<a href="{{route('carrito.mostrar')}}" class="btn btn-primary">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Regresar
					</a>
					<a href="{{route('payment')}}" class="btn btn-warning">
						Pagar con <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
					</a>
				</p>
			</div>
		</div>
	</div>
@endsection