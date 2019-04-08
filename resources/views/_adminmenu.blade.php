<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin_inicio')}}">Administrador</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <!-- BUSCADOR-->
            <form class="navbar-form pull-left" action="{{route('producto.busqueda')}}" method="GET" role="form" autocomplete="off" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar..." id="buscador" name="buscador">
                       <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-search"></span> <label></label></button>
                      </span>
                    </div><!-- /input-group -->
                </div>
            </form>
            <!-- FIN DEL BUSCADOR -->

                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="{{route('inicio')}}"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                    <li class=""><a href="{{route('users.index')}}">Usuarios</a></li>
                    <li class=""><a href="{{route('products.index')}}">Productos</a></li>
                    <li class=""><a href="{{route('categorias.index')}}">Categorias</a></li>
                    <li class=""><a href="{{route('tallas.index')}}">Tallas</a></li>
                    <li class=""><a href="{{route('admin.order.index')}}">Pedidos</a></li>
                    <li>
                        <a href="{{route('carrito.mostrar')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Carrito</a>
                    </li>

                    <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                                   <li><a href="{{ route('register') }}">Registrarse</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
