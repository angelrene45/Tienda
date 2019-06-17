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
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="glyphicon glyphicon-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="glyphicon glyphicon-off"></i> Cerrar Sesión</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 {{ csrf_field() }}
                             </form>
                    </li>
                </ul>
              </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li class=""><a href="{{route('admin_inicio')}}"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>

              <li class=""><a href="{{route('users.index')}}"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
              <li class=""><a href="{{route('products.index')}}"><i class="glyphicon glyphicon-tasks"></i> Productos</a></li>
              <li class=""><a href="{{route('categorias.index')}}"><i class="glyphicon glyphicon-th-large"></i> Categorias</a></li>
              <li class=""><a href="{{route('direcciones.index')}}"><i class="glyphicon glyphicon-map-marker"></i> Direcciones</a></li>
              <li class=""><a href="{{route('admin.order.index')}}"><i class="glyphicon glyphicon-th-list"></i> Pedidos</a></li>
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
