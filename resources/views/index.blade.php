@extends('layouts.app')

	@section('carrusel')
	<br><br>
	<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
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

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

	@endsection
	
    @section('principal')

     <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">Ultimos articulos</h2>
            </div>
			
			
            @foreach($productos as $producto)
            <div class="col-md-4 col-sm-6">
            <div class="estilodiv">
            
                <a href="{{route('producto.descripcion',['id' => $producto->id , 'slug' => $producto->slug])}}">
                	@foreach($producto->imagenes as $imagen)
                	<center>
                    <img class="imgindex" src="{{ URL::to('/') }}/images/productos/{{$imagen->imagen}}" width="300" height="320"  alt="">
                    </center>
                    @break
                   	@endforeach
                </a>
                    <h3 align="center">{{$producto->nombre}}</h3>
                	<h4 align="center">${{$producto->precio}}</h4> 
                	
            </div>
            </div>
            @endforeach
            
        </div>
        <!-- /.row -->

        

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Encuentra todos lo productos que buscas a un precio increible!</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="{{route('producto.busqueda')}}">Presiona aqui!</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Todos los derechos reservados &copy; Tienda online 2017</p>
                </div>
            </div>
        </footer>

    </div>

    
@endsection