  @extends('layouts.app')
    @section('inicio')
    active
    @endsection
  @section('content')

    <div class="container">

      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Hola, admin!</h1>
        <p>Esto es el panel de administracion en el cual podras editar, crear y eliminar productos, tallas, categorias, etc. </p>
        <p><a class="btn btn-primary btn-lg" href="{{route('inicio')}}" role="button">Visitar la pagina principal</a></p>
      </div>
    </div>

<center>
    <div class="row">
      <div class="col-md-4">
         <div class="jumbotron">
            <div class="container">
              <h1 class="display-3"><i class="glyphicon glyphicon-credit-card"></i></h1>
              <p><a class="btn btn-primary btn-lg" href="{{route ('admin.order.index')}}" role="button">Pedidos</a></p>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="jumbotron">
            <div class="container">
              <h1 class="display-3"><i class="glyphicon glyphicon-user"></i></h1>
              <p><a class="btn btn-primary btn-lg" href="{{route('users.index')}}" role="button">Usuarios</a></p>
            </div>
         </div>
      </div>


      <div class="col-md-4">
         <div class="jumbotron">
            <div class="container">
              <h1 class="display-3"><i class="glyphicon glyphicon-shopping-cart"></i></h1>
              <p><a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Productos</a></p>
            </div>
         </div>
      </div>
</center>


    </div> 

    
    </div><!-- /.container -->

@endsection

