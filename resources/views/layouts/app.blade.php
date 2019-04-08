<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Tienda online</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Plugins chosen para estilos en inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}} " >

    <link rel="stylesheet" href="{{ asset('css/miestilo.css')}} " >
    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->
  </head>


<body>
    <div id="app">

       @if (Auth::guest())
            @include('_menu') 
       @else
            @if(Auth::user()->type == 'admin')
                
                 @include('_adminmenu') 

            @else
                @include('_menu')

            @endif
       @endif

       @yield('carrusel')

       @yield('principal')
        
        
        <br>
        <br>
        <br>
        <br>

        <div class="container">
         <div class="row">
           <div class="col-md-10 col-md-offset-1">
                @include('flash::message')
           </div>
         </div>
        </div>

        @yield('content')

    </div>

    <!-- Scripts -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src=" {{ asset('jquery/jquery.min.js') }}"></script>
        <script src=" {{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- script para plugin chosen para estilos en inputs-->
        <script src="{{ asset('plugins/chosen/chosen.jquery.js')}} "></script>
        <script src=" {{ asset('js/carrito.js') }}"></script>

        @yield('scripts')

</html>

