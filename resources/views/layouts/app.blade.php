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
    <link rel="stylesheet" href="{{ asset('css/sidebar.css')}} " >

    @yield('css')


  </head>


<body>
    <div id="app">


       @if (Auth::guest())
            @include('_menu_client')
       @elseif(Auth::user()->type == 'admin')
             @include('_menu_admin')
       @elseif(Auth::user()->type == 'member')
            @include('_menu_client')

       @elseif(Auth::user()->type == 'purchaser')
            @include('_menu_purchaser')

       @endif

        <br>
        <br>
        <br>
        <br>



    </div>


    <!-- Scripts -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src=" {{ asset('jquery/jquery-3.4.1.min.js') }}"></script>
        <script src=" {{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- script para plugin chosen para estilos en inputs-->
        <script src="{{ asset('plugins/chosen/chosen.jquery.js')}} "></script>
        <script src=" {{ asset('js/carrito.js') }}"></script>
        <script src=" {{ asset('js/sidebar.js') }}"></script>
        <script src=" {{ asset('js/sweetalert.min.js') }}"></script>
        @yield('scripts')

    </body>

</html>
