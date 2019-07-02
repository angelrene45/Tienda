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

		<br>
				<div class="row">
					<div class="col-md-2 col-xs-2">
							<img src="{{asset('/images/sandvik-logo.png')}}" width="100%" />
					</div>
          <div class="col-md-8 col-xs-8">
              <h2 class="text-center">Shel Seguridad e Higiene S.A. de C.V.</h2>
							<h4 class="text-center">Portal Sandvik</h4>
          </div>
					<div class="col-md-2 col-xs-2">
							<img src="{{asset('/images/shel-logo.png')}}" width="100%" />
					</div>

					<div class="col-md-12 col-xs-12">
							<h5><strong>Funciones del sitio:</strong></h5>
					</div><br>

					<div class="col-md-12 col-xs-12">
							<a href="{{route('producto.indexBusqueda')}}">Busqueda del producto</a>
							<p>Buscar un producto por codigo, categoria o utilizando el nombre. </p>
					</div>
					<div class="col-md-12 col-xs-12">
							<a href="{{route('carrito.mostrar')}}">Carrito de compras</a>
							<p>Revisar los artículos en el carrito de compras. </p>
					</div>
					<div class="col-md-12 col-xs-12">
							<a href="{{route('pedidos.index')}}">Pedidos</a>
							<p>Ver el estatus de ordenes y productos. </p>
					</div>

			</div>

			<br>

				@if(count($productos) > 0)
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<h5><strong>Algunos de nuestros productos:</strong></h5><br>
						</div>
						@foreach($productos as $producto)
						<div class="col-md-3 col-xs-6">
							<a href="{{route('producto.descripcion',['id' => $producto->id , 'slug' => $producto->slug])}}" title="{{$producto->codigo}}">
								@if($producto->imagen==NULL)
									<img class="center-block  imghover" width="80%" height="200px"   src="{{ URL::to('/') }}/images/image-unavailable.png" alt="{{$producto->codigo}}">
								@else
									<img class="center-block  imghover" width="80%" height="200px"  src="{{ URL::to('/') }}/images/productos/{{$producto->imagen->imagen}}" alt="{{$producto->codigo}}">
								@endif
							</a>
						</div>
						@endforeach
					</div>
			    @else
			@endif


@endsection

@section('scripts')
<script src=" {{ asset('js/funcionesajax.js') }}"></script>
@endsection
