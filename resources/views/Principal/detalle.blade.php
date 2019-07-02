@extends('layouts.app')

@section('principal')

		<div class="text-center">
			<div class="page-header">
			  <h1 class="labeltitle2"><i class="glyphicon glyphicon-shopping-cart"></i> Detalle del producto</h1> <small>{{$producto->codigo}}</small>
			</div>


			<div class="row">
			  <div class="col-md-6">

			  <br><br>
				<center>
				@if(count($producto->imagenes)== 0)
			    <a href="#editar"  data-toggle="modal" data-target="#editar">
			      <img class="img-responsive" src="{{ URL::to('/') }}/images/image-unavailable.png" alt="..." width="500" height="500" class="img-rounded">
			    </a>
				@else
			 	 @for ($i=0; $i<count($producto->imagenes); $i++)

				    <a href="#editar"  data-toggle="modal" data-target="#editar">
				      <img class="img-responsive" src="{{ URL::to('/') }}/images/productos/{{$producto->imagenes[$i]->imagen}}" alt="..." width="500" height="500" class="img-rounded">
				    </a>

				    @break
				 @endfor
				@endif
				</center>
				 <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#editar">
    			<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>

    			</button>


			</div>

			  <div class="col-md-6">

					<h3 class="labeltitle2">{{$producto->nombre}}</h3><hr>
					<p style=" text-align: justify; text-justify: inter-word;" class="labelstock">Descripcion: <br><br>{{ $producto->descripcion }}</p>
					<a href="{{route('producto.pdf',['producto' => $producto->id]) }}" class="btn btn-danger">
					 <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> PDF
					</a>
				</div>

				<div class="col-md-12">
					<hr>
				</div>

				<div class="col-md-12">
					<form method="POST" action="{{route('carrito.añadir' , $producto->slug)}}">
					    {{ csrf_field() }}
					    {{ method_field('GET') }}

							<h3>
								<span class="label label-info labelstock">Precio: ${{ number_format($producto->precio,2) }} {{$producto->moneda}}</span>
							</h3><br>

							<p>
								<span class="labelstock">Cantidad:</span>
								<input id="cantidad" name="cantidad" type="number" value="1" min="1" max="100"><br><br>
								<input class="hidden" id="moneda" name="moneda" value="{{$producto->moneda}}">
								<button type="submit" class="btn btn-default btn-add-car"><i class="glyphicon glyphicon-shopping-cart"></i> Añadir al carrito</button>
							</p>
					</form>


					<br>

				</div>

			</div><hr>

			<p>
				<a class="btn btn-primary" href="{{ route('producto.busqueda') }}">
					<i class="glyphicon glyphicon-chevron-left"></i> Regresar
				</a>
			</p>

		</div>


		<!-- Modal -->

		<!-- Modal -->
			<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">{{$producto->nombre}}</h4>
					 </div>

						<div class="modal-body">

					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
						@for ($i=0; $i<count($producto->imagenes); $i++)
							<div class="item @if($i == 0) active @endif">
							<center>
								<img class="img-responsive" src="{{ URL::to('/') }}/images/productos/{{$producto->imagenes[$i]->imagen}}" width="600" height="650"  alt="...">
							 </center>

							</div>
						@endfor
							...
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Atras</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Siguiente</span>
						</a>
					</div>

						</div>


					</div>
				</div>
			</div>

@endsection
