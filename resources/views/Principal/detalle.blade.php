@extends('layouts.app')

@section('principal')

		<div class="text-center principaldetalle">
			<div class="page-header">
			  <h1 class="labeltitle2"><i class="glyphicon glyphicon-shopping-cart"></i> Detalle del producto</h1>
			</div>

			<div class="row">
			  <div class="col-md-8">

			  <br><br>
				<center>
			 	 @for ($i=0; $i<count($producto->imagenes); $i++)

				    <a href="#editar"  data-toggle="modal" data-target="#editar">
				      <img class="img-responsive" src="{{ URL::to('/') }}/images/productos/{{$producto->imagenes[$i]->imagen}}" alt="..." width="500" height="500" class="img-rounded">
				    </a>

				    @break
				 @endfor
				</center>
				 <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#editar">
    			<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>

    			</button>


			</div>

			  <div class="col-md-4">

				  <div class="product-block">
					<h3 class="labeltitle2">{{$producto->nombre}}</h3><hr>
					<div class="producto-info panel">


				<form method="POST" action="{{route('carrito.añadir' , $producto->slug)}}">
				    {{ csrf_field() }}
				    {{ method_field('GET') }}


						<p class="labelstock">Descripcion: <br><br>{{ $producto->descripcion }}</p><hr>
						<h3>
							<span class="label label-info labelstock">Precio: ${{ number_format($producto->precio,2) }}</span><hr>
						</h3><br>
						<p>
							<button type="submit" class="btn btn-default btn-add-car"><i class="glyphicon glyphicon-shopping-cart"></i> Añadir al carrito</button>
						</p>
				</form>



	      </div>

						<br>
                <a href="{{route('producto.pdf',['producto' => $producto->id]) }}" class="btn btn-danger">
                 <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> PDF
               	</a>

					</div>
				</div>

			</div><hr>

			<p>
				<a class="btn btn-primary" href="{{ route('producto.busqueda') }}">
					<i class="glyphicon glyphicon-chevron-left"></i> Regresar
				</a>
			</p>

		</div>
@endsection



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
							      <div class="carousel-caption">
							        ...
							      </div>
							    </div>
							  @endfor
							    ...
							  </div>

							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>

					      </div>


					    </div>
					  </div>
					</div>
