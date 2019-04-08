@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container text-center">

        <!-- Page Header -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Productos
                    <small>{{$palabra}}</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        @if(count($productos))
        <!-- Projects Row -->
        <div class="row busqueda-producto">
          @foreach($productos as $producto)
            <div class="col-md-4 portfolio-item">

                <a href="{{route('producto.descripcion', ['id' => $producto->id , 'slug' => $producto->slug] )}}">
                	<center>
                    	<img class="img-responsive" src="{{ URL::to('/') }}/images/productos/{{$producto->imagenes[0]->imagen}}">
                    </center>
                </a>
                <h3>
                    <a href="#">{{$producto->nombre}}</a>
                </h3>
                <p> 
                	<b>${{$producto->precio}}</b>
                </p>
            </div>
          @endforeach
		</div>
        <!-- /.row -->

        <hr>

		<!-- Pagination -->
        <center>
      	{{ $productos->links() }} 
    	</center>
 

        <hr>

        @else

         <h2>Ups!! No se encontro ningun producto :( </h2>

@endif

	
@endsection