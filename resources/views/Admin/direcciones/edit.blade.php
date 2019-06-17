@extends('layouts.app')

 @section('content')

<div class="row">
  <div class="col-md-12">

  <div class="panel panel-default">
    <div class="panel-heading">Crear direccion</div>
      <div class="panel-body">

       <form action="{{route('direcciones.update', $direccion->id)}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
         {{csrf_field()}}
         {{ method_field('PUT') }}

         <div class="form-group{{ $errors->has('codigo_postal') ? ' has-error' : '' }}" >
             <label for="">Codigo postal</label>
             <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"  placeholder="Codigo postal" value="{{ $direccion->codigo_postal or old('codigo_postal') }}" required autofocus>
             @if ($errors->has('codigo_postal'))
                <span class="help-block">
                  <strong>{{ $errors->first('codigo_postal') }}</strong>
                </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}" >
             <label for="">Colonia</label>
             <input type="text" class="form-control" id="colonia" name="colonia"  placeholder="Colonia" value="{{ $direccion->colonia or old('colonia') }}" required autofocus>
             @if ($errors->has('colonia'))
                <span class="help-block">
                  <strong>{{ $errors->first('colonia') }}</strong>
                </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}" >
             <label for="">Calle</label>
             <input type="text" class="form-control" id="calle" name="calle"  placeholder="Calle" value="{{ $direccion->calle or old('calle') }}" required autofocus>
             @if ($errors->has('calle'))
                <span class="help-block">
                  <strong>{{ $errors->first('calle') }}</strong>
                </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('numero_exterior') ? ' has-error' : '' }}" >
             <label for="">Numero exterior</label>
             <input type="text" class="form-control" id="numero_exterior" name="numero_exterior"  placeholder="Numero exterior" value="{{ $direccion->numero_exterior or old('numero_exterior') }}" required autofocus>
             @if ($errors->has('numero_exterior'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_exterior') }}</strong>
                </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}" >
             <label for="">Estado</label>
             <input type="text" class="form-control" id="estado" name="estado"  placeholder="Estado" value="{{ $direccion->estado or old('estado') }}" required autofocus>
             @if ($errors->has('estado'))
                <span class="help-block">
                  <strong>{{ $errors->first('estado') }}</strong>
                </span>
            @endif
         </div>

         <div class="form-group{{ $errors->has('municipio') ? ' has-error' : '' }}" >
             <label for="">Municipio</label>
             <input type="text" class="form-control" id="municipio" name="municipio"  placeholder="Municipio" value="{{ $direccion->municipio or old('municipio') }}" required autofocus>
             @if ($errors->has('municipio'))
                <span class="help-block">
                  <strong>{{ $errors->first('municipio') }}</strong>
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
