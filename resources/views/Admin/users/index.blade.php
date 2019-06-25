 @extends('layouts.app')
  @section('usuarios')
    active
  @endsection

  @section('content')
   <div class="row">
    <div class="col-md-12">

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Usuarios</div>
        <div class="panel-body">
          <a class="btn btn-primary" href="{{route('users.create')}}" role="button"> Nuevo Usuario
          </a>
        </div>

        <!-- Table -->
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Correo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>
        @if($user->type == 'member')
        <span class="label label-primary">Cliente</span>
        @elseif ($user->type == 'purchaser')
        <span class="label label-warning">Comprador</span>
        @else
        <span class="label label-danger">Administrador</span>
        @endif
              </td>
              <td>{{$user->email}}</td>
              <td>

              <a onclick="return confirm('Estás seguro de eliminar el usuario?')" href="{{ route('admin.users.destroy' , ['id' => $user->id ] ) }}" class="glyphicon glyphicon-remove-circle btn btn-danger" ></a>

              <a href="{{route('users.edit' , $user->id )}}" class="glyphicon glyphicon-pencil btn btn-warning"></a>

              </td>
            </tr>
           @endforeach
          </tbody>
        </table>

    <center>
      {{ $users->links() }}
    </center>


      </div>

      </div>


  </div>
 </div>

  @endsection
