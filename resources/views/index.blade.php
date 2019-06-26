@extends('layouts.app')

	@section('carrusel')
<!--

    <header id="myCarousel" class="carousel slide">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>


        <div class="carousel-inner">
            <div class="item active">
                <div class="fill">
                	<img src="{{ URL::to('/') }}/images/carrusel/puma.jpg">
                </div>
                <div class="carousel-caption">
                    <h3>Envios desde $100</h3>
                </div>
            </div>
            <div class="item">
                <div class="fill">
                	<img src="{{ URL::to('/') }}/images/carrusel/carrusel10.jpg">
                </div>

            </div>
            <div class="item">
                <div class="fill">
                	<img src="{{ URL::to('/') }}/images/carrusel/carrusel3.jpg">
                </div>

            </div>
        </div>


        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

	-->

	@endsection

    @section('principal')

				<div class="row">
            <div class="col-md-12">
                <h2 class="labeltitle">Ultimos articulos</h2>
            </div>
				</div>


            @foreach($productos as $producto)
						<form method="POST" action="{{route('carrito.add' , $producto->slug)}}">
							{{ csrf_field() }}
							{{ method_field('GET') }}
							<div class="row imgindex" >
	            <div class="col-sm-3 col-md-3">


	                <a href="{{route('producto.descripcion',['id' => $producto->id , 'slug' => $producto->slug])}}">
										@if(count($producto->imagenes)==0)
											<img class="center-block" height="180px" width="200px" src="{{ URL::to('/') }}/images/image-unavailable.png"   alt="">
										@else
		                	@foreach($producto->imagenes as $imagen)
		                    <img class="center-block" height="180px" width="200px" src="{{ URL::to('/') }}/images/productos/{{$imagen->imagen}}"   alt="">
		                    @break
		                  @endforeach
										@endif
	                </a>
							 </div>

							 <h3 class="labeltitle center-block">{{$producto->nombre}}</h3>
							 <span class="labelstock center-block hidden">Existencia: {{$producto->stock}}</span>
							 <br>

							 <div class="col-sm-9 col-md-9">
									<table class="table table-condensed">
									  <tr>
									    <th>Codigo</th>
									    <th>Precio</th>
									    <th>Cantidad</th>
											<th></th>
									  </tr>
									  <tr>
									    <td>{{$producto->codigo}}</td>
									    <td>${{number_format($producto->precio,2)}}
												<span class="label
													@if($producto->moneda == "MXN")
														label-success
													@elseif($producto->moneda == "USD")
														label-danger
													@else
														label-info
													@endif
													">{{$producto->moneda}}
													<input class="hidden" type="text" name="moneda" id="moneda" value="{{$producto->moneda}}">
												</span>
											</td>
									    <td><input id="cantidad" name="cantidad" type="number" value="1" min="1" max="10000"></td>
											<td>
												<button type="submit" class="btn btn-default btn-add-car"><i class="glyphicon glyphicon-shopping-cart"></i> Añadir al carrito</button>
											</td>
									  </tr>
									</table>
								</div>
							</div>
						</form>
						<br><br>
            @endforeach

        <hr>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Todos los derechos reservados &copy; Shel Seguridad e Higiene</p>
                </div>
            </div>
        </footer>

				<!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Encuentra todos lo productos que buscas a un precio increible!</p>
                </div>

            </div>
        </div>

@endsection

@section('scripts')
<script src=" {{ asset('js/funcionesajax.js') }}"></script>
@endsection
