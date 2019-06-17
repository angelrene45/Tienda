@extends('layouts.app')

 @section('content')
  <div class="row">
   <div class="col-md-12">

     <div class="panel panel-default">
       <!-- Default panel contents -->
       <div class="panel-heading">Direcciones</div>
       <div class="panel-body">
         <a class="btn btn-primary" href="{{route('direcciones.create')}}" role="button"> <span class="glyphicon glyphicon-map-marker"></span> Nueva Direccion
         </a>
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
