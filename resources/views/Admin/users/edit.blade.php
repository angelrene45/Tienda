 @extends('layouts.app')

  @section('content')
  	<div class="container">

  	<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Usuarios</div>
      <div class="panel-body">

      <form action="{{route('users.update', $user->id )}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
       {{csrf_field()}}
       {{ method_field('PUT') }}

           
           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
               <label for="">Nombre</label>
               <input type="text" class="form-control" id="name" name="name"  placeholder="Nombre completo" value="{{ $user->name or old ('name') }}" autofocus pattern="[a-zA-Z0-9 ]+" >
                @if ($errors->has('name'))
                 <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                 </span>
             @endif
           </div>

           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="">Correo Electrónico</label>
               <input type="email" class="form-control" id="email" name="email"  placeholder="ejemplo@gmail.com" value="{{ $user->email or old ('email') }}">
                @if ($errors->has('email'))
                 <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
           </div>

      <div class="form-group">
        <label>Tipo de usuario</label>
        <select class="form-control chosen-user" id="type" name="type">
                    <option value="member"
            @if($user->type == 'member')
                        selected='selected'
                      @endif
                    >
                      Miembro 
                    </option>
                    <option value="admin" 
                      @if($user->type == 'admin')
                        selected='selected'
                      @endif
                      >
                      Administrador
                    </option>
                  
              </select> 
      </div>

           <button type="submit" class="btn btn-primary">Editar</button>
            
            
       </form>
        
      </div>

     </div>

  	</div>
	
  @endsection