 @extends('layouts.app')

 	@section('categorias')
		active
 	@endsection

  @section('content')

 <div class="row">
   <div class="col-md-12">

   <div class="panel panel-default">
     <div class="panel-heading">Editar categoria</div>
       <div class="panel-body">

        <form action="{{route('categorias.update' , $categoria->id)}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}

          <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}" >
              <label for="">Categoria</label>
              <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Escriba la categoria" value="{{ $categoria->nombre or old('nombre') }}" required autofocus pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+">
              @if ($errors->has('nombre'))
                 <span class="help-block">
                   <strong>{{ $errors->first('nombre') }}</strong>
                 </span>
             @endif
          </div>


           <button type="submit" class="btn btn-primary">Actualizar</button>


       </form>


          </div>
       </div>
     </div>
   </div>



  @endsection
