 @extends('layouts.app')

  @section('content')
	<div class="container">

   <div class="panel panel-default">
     <div class="panel-heading">Crear usuario</div>
       <div class="panel-body">

        <form action="{{route('users.store')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field()}}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
              <label for="">Nombre</label>
              <input type="text" class="form-control" id="name" name="name"  placeholder="Nombre completo" value="{{ old('name') }}" required autofocus pattern="[a-zA-Z0-9 ]+">
              @if ($errors->has('name'))
                 <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
          </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="">Correo Electrónico</label>
               <input type="email" class="form-control" id="email" name="email"  placeholder="ejemplo@gmail.com" value="{{ old('email') }}" required >
               @if ($errors->has('email'))
                 <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                 </span>
               @endif
           </div>

           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <label for="">Contraseña</label>
               <input type="password" class="form-control" id="password" name="password"  placeholder="********" value="{{ old('password') }}" required >
               @if ($errors->has('password'))
                 <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                 </span>
               @endif
           </div>

          <div class="form-group">
            <label>Tipo de usuario</label>
            <select class="form-control" id="type" name="type" select="{{old ('type')}}" >
                        <option value="member">
                          Cliente
                        </option>
                        <option value="purchaser">
                          Comprador
                        </option>
                        <option value="admin">
                          Administrador
                        </option>
            </select>
          </div>



           <button type="submit" class="btn btn-primary">Registrar</button>


       </form>


       </div>
     </div>


</div><!-- /.container -->
  @endsection

  	@section('scripts')
  <!--script para la animacion del select tallas-->
        <script>
        $(".chosen-user").chosen({
          placeholder_text_multiple: 'Seleccione el tipo de usuario',
          no_results_text: "Oops, no se encontro esa talla!"
        });

        </script>
	@endsection
