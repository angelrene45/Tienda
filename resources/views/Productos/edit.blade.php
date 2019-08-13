@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('trumbowyg/dist/ui/trumbowyg.min.css')}}">
@endsection

  @section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Editar producto</div>
              <div class="panel-body">


              <form action="{{ route('products.update' ,['producto' => $producto->id]) }}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data" >
               {{ csrf_field() }}
               {{ method_field('PUT') }}

           <div class="form-group{{ $errors->has('Codigo') ? ' has-error' : '' }}">
               <label for="">Codigo</label>
               <input type="text" class="form-control" id="Codigo" name="Codigo"  placeholder="Input field" value="{{ $producto->codigo or old ('Codigo') }}" required autofocus >
               @if ($errors->has('Codigo'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Codigo') }}</strong>
                 </span>
             @endif
           </div>
           <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="">Nombre</label>
               <input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Input field" value="{{ $producto->nombre or old ('Nombre') }}" required autofocus >
               @if ($errors->has('Nombre'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Nombre') }}</strong>
                 </span>
             @endif
           </div>
           <div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
               <label for="">Descripcion</label>
               <textarea class="form-control textarea-content" rows="5" id="Descripcion" name="Descripcion"  placeholder="Escriba la descripcion del producto">{{ $producto->descripcion or old('Descripcion') }}</textarea>
               @if ($errors->has('Descripcion'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Descripcion') }}</strong>
                 </span>
             @endif
           </div>
           <div class="form-group{{ $errors->has('Precio') ? ' has-error' : '' }}">
               <label for="">Precio</label>
               <input type="number" step="0.01" class="form-control" id="Precio" name="Precio"  placeholder="Input field" value="{{ $producto->precio or old ('Precio') }}" required>
               @if ($errors->has('Precio'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Precio') }}</strong>
                 </span>
             @endif
           </div>

           <div class="form-group">
             <label>Moneda</label>
             <select class="form-control chosen-user" id="Moneda" name="Moneda">
                         <option value="USD"
                         @if($producto->moneda == 'USD')
                             selected='selected'
                           @endif
                         >
                           USD
                         </option>
                         <option value="MXN"
                           @if($producto->moneda == 'MXN')
                             selected='selected'
                           @endif
                           >
                           MXN
                         </option>
                         <option value="EUR"
                           @if($producto->moneda == 'EUR')
                             selected='selected'
                           @endif
                           >
                           EUR
                         </option>
                   </select>
                   @if ($errors->has('Moneda'))
                     <span class="help-block">
                       <strong>{{ $errors->first('Moneda') }}</strong>
                     </span>
                  @endif
           </div>

           <div class="form-group{{ $errors->has('Stock') ? ' has-error' : '' }} hidden">
               <label for="">Stock</label>
               <input type="number" class="form-control" id="Stock" name="Stock" placeholder="Input field" value="{{ $producto->stock}}" required>
               @if ($errors->has('Stock'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Stock') }}</strong>
                 </span>
             @endif
           </div>

            <div class="form-group{{ $errors->has('Categoria') ? ' has-error' : '' }}">
                <label for="">Categoria</label>
                <select class="form-control chosen-select2" id="Categoria" name="Categoria" required >
                  @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}"
                      @if($producto->categoria_id == $categoria->id)
                        selected='selected'
                      @endif
                    >
                      {{$categoria->nombre}}
                    </option>
                  @endforeach
                </select>
                @if ($errors->has('Categoria'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Categoria') }}</strong>
                 </span>
             @endif
            </div>



        <hr size="10" />
              <div class="form-group">
                <label>Imagenes del producto</label>
                <br>
                @foreach($imagenes as $imagen)


                  <img src="{{ URL::to('/') }}/images/productos/{{$imagen->imagen}}" class="img-rounded" width="280" height="230" >


                @endforeach

              </div>
          @if($imagenes->count() > 0)
              <div class="form-group">
                <a class="btn btn-danger" href="{{ action('ProductoController@borrar_imagenes', ['id' => $producto->id]) }}" role="button">
                <span >Borrar imagenes</span>
                </a>
              </div>
          @endif



            @if($imagenes->count() == 0)
              <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }} ">
              <input type="file" id="imagen" name="imagen[]" enctype="multipart/form-data" multiple>
              @if ($errors->has('imagen'))
                 <span class="help-block">
                   <strong>No se puden subir mas de 3 imagenes</strong>
                 </span>
             @endif
              </div>
            @endif

        <hr size="10" />

           <button type="submit" class="btn btn-primary">Actualizar</button>
       </form>





       </div>

      </div>


    </div>
  </div>

@endsection


@section('scripts')
        <script src="{{asset('trumbowyg/dist/trumbowyg.min.js')}}"></script>

        <!--script para la animacion del select tallas-->
        <script>
        $(".chosen-select").chosen({
          placeholder_text_multiple: 'Seleccione las tallas disponibles de su producto',
          no_results_text: "Oops, no se encontro esa talla!"
        });

        $(".chosen-select2").chosen({
          no_results_text: "Oops, no se econtro esa categoria!"
        });

          $(".textarea-content").trumbowyg();
        </script>
@endsection
