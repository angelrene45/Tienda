@extends('layouts.app')

 @section('content')
  <div class="row">
   <div class="col-md-12">

     @if(count($errors) > 0)
       <div class="alert alert-danger">
         Error en la validación del archivo
         @foreach($errors->all() as $error)
           <li>{{$error}}</li>
         @endforeach
       </div>
     @endif

     <div class="panel panel-default">
       <!-- Default panel contents -->
       <div class="panel-heading">Direcciones</div>
       <div class="panel-body">
         <div class="col-md-6">
           <a class="btn btn-primary" href="{{route('direcciones.create')}}" role="button"> <span class="glyphicon glyphicon-map-marker"></span> Nueva Direccion
           </a>
         </div>

        <div class="col-md-6">
          <form  class="form-inline" method="post" enctype="multipart/form-data" action="{{route('direcciones.importExcel')}}">
            {{csrf_field()}}
            <div class="form-group">
             <input type="file" name="excel_data" id="excel_data">
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="button"><span class="glyphicon glyphicon-upload"></span> Subir</button>
            </div>
          </form>
        </div>


       </div>

       <!-- Table -->
       <div class="table-responsive">
       <table class="table table-hover">
         <thead>
           <tr>
             <th>codigo_postal</th>
             <th>colonia</th>
             <th>calle</th>
             <th>numero_exterior</th>
             <th>estado</th>
             <th>municipio</th>
             <th></th>
           </tr>
         </thead>
         <tbody>
         @foreach($direcciones as $direccion)
           <tr>
             <td>{{$direccion->codigo_postal}}</td>
             <td>{{$direccion->colonia}}</td>
             <td>{{$direccion->calle}}</td>
             <td>{{$direccion->numero_exterior}}</td>
             <td>{{$direccion->estado}}</td>
             <td>{{$direccion->municipio}}</td>
             <td>

             <a href="{{ route('direcciones.destroy' , ['id' => $direccion->id ] ) }}" class="glyphicon glyphicon-remove-circle btn btn-danger" ></a>

             <a href="{{route('direcciones.edit' , $direccion->id )}}" class="glyphicon glyphicon-pencil btn btn-warning"></a>

             </td>
           </tr>
          @endforeach
         </tbody>
       </table>

   <center>
     {{ $direcciones->links() }}
   </center>


     </div>

     </div>


 </div>
</div>

 @endsection
