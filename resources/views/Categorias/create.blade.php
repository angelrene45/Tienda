
 @extends('layouts.app')

    @section('categorias')
      active
    @endsection

  @section('content')

 <div class="row">
   <div class="col-md-12">

   <div class="panel panel-default">
     <div class="panel-heading">Crear categoria</div>
       <div class="panel-body">

        <form action="{{route('categorias.store')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field()}}

          <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}" >
              <label for="">Categoria</label>
              <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Escriba la categoria" value="{{ old('nombre') }}" required autofocus pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+">
              @if ($errors->has('nombre'))
                 <span class="help-block">
                   <strong>{{ $errors->first('nombre') }}</strong>
                 </span>
             @endif
          </div>


           <button type="submit" class="btn btn-primary">Registrar</button>


       </form>


          </div>
       </div>
     </div>
   </div>

  @endsection
