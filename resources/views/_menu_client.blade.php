<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding-left:50px" href="{{route('inicio')}}">
                <img  src="{{ asset('images/logo.png')}}"  width="50px" alt="Shel Seguridad E Higiene">
            </a>
        </div>

        <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                @if (Auth::guest())
                  <a href="{{ route('login') }}">Iniciar Sesion <b class="glyphicon glyphicon-user"></b></a>
                @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <span class="caret"></a>
                <ul class="dropdown-menu">
                  <!--  <li><a href="#"><i class="glyphicon glyphicon-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                    <li class="divider"></li> -->
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                             </form></li>
                </ul>
                @endif
              </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                  <a href="{{route('producto.indexBusqueda')}}"><i class="glyphicon glyphicon-search"></i>  Busqueda del Producto</a>
                    <!--Ejemplo dropdown
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                    </ul>
                    -->
                </li>
                <li>
                    <a href="{{route('pedidos.index')}}"><i class="glyphicon glyphicon-th-list"></i>  Pedidos</a>
                </li>
                <li>
                    <a href="{{route('carrito.mostrar')}}"><i class="glyphicon glyphicon-shopping-cart"></i> Carrito de compras
                      <span class="badge" id="numitems">
                        @if(Session::has('carrito'))
                          {{ count(\Session::get('carrito')) }}
                        @else
                          0
                        @endif
                      </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">


          @include('flash::message')

          @yield('carrusel')

          @yield('principal')

          @yield('content')


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div><!-- /#wrapper -->
