
  @extends('layouts.app')

  @section('content')
    
 
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Alta productos</div>
        <div class="panel-body">

        <form action="{{route('products.store')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
       {{csrf_field()}}
           
       
           <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="">Nombre</label>
               <input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Escriba el nombre del producto" value="{{ old('Nombre') }}" required autofocus pattern="[a-zA-Z0-9 ]+">
               @if ($errors->has('talla'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Nombre') }}</strong>
                 </span>
               @endif
           </div>
           <div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
               <label for="">Descripcion</label>
               <input type="text" class="form-control" id="Descripcion" name="Descripcion"  placeholder="Escriba la descripcion del producto" value="{{ old('Descripcion') }}" pattern="[a-zA-Z0-9 ]+">
                @if ($errors->has('Descripcion'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Descripcion') }}</strong>
                 </span>
             @endif
           </div>
           <div class="form-group{{ $errors->has('Precio') ? ' has-error' : '' }}">
               <label for="">Precio</label>
               <input type="number" class="form-control" id="Precio" name="Precio" placeholder="$" value="{{ old('Precio') }}">
                @if ($errors->has('Precio'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Precio') }}</strong>
                 </span>
             @endif
           </div>
           
           <div class="form-group{{ $errors->has('Stock') ? ' has-error' : '' }}">
               <label for="">Stock</label>
               <input type="number" class="form-control" id="Stock" name="Stock" placeholder="Stock disponible" value="{{ old('Stock') }}">
                @if ($errors->has('Stock'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Stock') }}</strong>
                 </span>
             @endif
           </div>

            <div class="form-group{{ $errors->has('Categoria') ? ' has-error' : '' }}">
                <label for="">Categoria</label>
                <select class="form-control chosen-select2" id="Categoria" name="Categoria">
                  @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @endforeach
                </select>
                 @if ($errors->has('Categoria'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Categoria') }}</strong>
                 </span>
                @endif
            </div>

            <div class="form-group">
                <label for="">Tallas</label>
                <br>
               
                <select multiple class="form-control chosen-select"  id="tallas" name="tallas[]">
                 @foreach($tallas as $talla)
                    <option value="{{$talla->id}}">
                      {{ $talla->talla }}
                    </option>
                 @endforeach  
                 </select>  
            </div>

            <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
              <label for="exampleInputFile">Imagen</label>
              <input type="file" id="imagen" name="imagen[]" enctype="multipart/form-data" multiple>
              <p class="help-block">Maximo 3</p>
               @if ($errors->has('imagen'))
                 <span class="help-block">
                   <strong>{{ $errors->first('imagen') }}</strong>
                 </span>
             @endif
            </div>


           <button type="submit" class="btn btn-primary">Alta</button>
       </form>
           
        

        </div>
          
        </div> 


      </div>
     </div>
    </div><!-- /.container --> 
@endsection

@section('scripts')
  <!--script para la animacion del select tallas-->
        <script>
        $(".chosen-select").chosen({
          placeholder_text_multiple: 'Seleccione las tallas disponibles de su producto',
          no_results_text: "Oops, no se encontro esa talla!"
        });

        $(".chosen-select2").chosen({
          no_results_text: "Oops, no se econtro esa categoria!"
        });
        </script>
@endsection