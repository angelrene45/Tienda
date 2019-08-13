
  @extends('layouts.app')

  @section('css')
  <link rel="stylesheet" href="{{asset('trumbowyg/dist/ui/trumbowyg.min.css')}}">
  @endsection


  @section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Alta productos</div>
        <div class="panel-body">

        <form action="{{route('products.store')}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
       {{csrf_field()}}


         <div class="form-group{{ $errors->has('Codigo') ? ' has-error' : '' }}">
             <label for="">Código</label>
             <input type="text" class="form-control" id="Codigo" name="Codigo"  placeholder="Escriba el nombre del producto" value="{{ old('Codigo') }}" required autofocus>
             @if ($errors->has('Codigo'))
               <span class="help-block">
                 <strong>{{ $errors->first('Codigo') }}</strong>
               </span>
             @endif
         </div>
           <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
               <label for="">Nombre</label>
               <input type="text" class="form-control" id="Nombre" name="Nombre"  placeholder="Escriba el nombre del producto" value="{{ old('Nombre') }}" required autofocus>
               @if ($errors->has('Nombre'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Nombre') }}</strong>
                 </span>
               @endif
           </div>
           <div class="form-group{{ $errors->has('Descripcion') ? ' has-error' : '' }}">
               <label for="">Descripcion</label>
               <textarea class="form-control textarea-content" rows="5" id="Descripcion" name="Descripcion"  placeholder="Escriba la descripcion del producto">{{ old('Descripcion') }}</textarea>
                @if ($errors->has('Descripcion'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Descripcion') }}</strong>
                 </span>
             @endif
           </div>
           <div class="form-group{{ $errors->has('Precio') ? ' has-error' : '' }}">
               <label for="">Precio</label>
               <input type="number" step="0.01" class="form-control" id="Precio" name="Precio" placeholder="$" value="{{ old('Precio') }}">
                @if ($errors->has('Precio'))
                 <span class="help-block">
                   <strong>{{ $errors->first('Precio') }}</strong>
                 </span>
             @endif
           </div>

           <div class="form-group{{ $errors->has('Moneda') ? ' has-error' : '' }}">
             <label for="">Moneda</label>
             <select class="form-control chosen-select2" id="Moneda" name="Moneda" select="{{old ('Moneda')}}" >
                         <option value="USD">
                           USD
                         </option>
                         <option value="MXN">
                           MXN
                         </option>
                         <option value="EUR">
                           EUR
                         </option>
             </select>
           </div>

           <div class="form-group{{ $errors->has('Stock') ? ' has-error' : '' }} hidden">
               <label for="">Stock</label>
               <input type="number" class="form-control" id="Stock" name="Stock" placeholder="Stock disponible" value="0">
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
@endsection

@section('scripts')
  <!--script para la animacion del select tallas-->
        <script src="{{asset('trumbowyg/dist/trumbowyg.min.js')}}"></script>
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
