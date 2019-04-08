@extends('layouts.app')

      @section('tallas')
        active
      @endsection

 @section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Tallas</div>
        <div class="panel-body">

			
	          <a class="btn btn-primary" href="{{route('tallas.create')}}" role="button"> Nueva talla   
	          </a>
	        

			<!-- BUSCADOR-->
			<form class="navbar-form pull-right" action="{{route('tallas.index')}}" method="GET" role="form" autocomplete="off" enctype="multipart/form-data">
       		
				<div class="form-group">
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Buscar..." id="buscador" name="buscador">
				       <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" >Ir!</button>
				      </span>
				    </div><!-- /input-group -->
				</div>
       		</form>
			<!-- FIN DEL BUSCADOR -->

        </div>

        <!-- Table -->
	
        <div class="table-responsive">
        <table class="table table-striped ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Talla</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          @foreach($tallas as $talla)
            <tr>
              <td>{{$talla->id}}</td>
              <td>{{$talla->talla}}</td>
              
              <td>

              <a href="{{ route('tallas.destroy' , ['id' => $talla->id ] ) }}" class="glyphicon glyphicon-remove-circle btn btn-danger" ></a>

              <a href="{{route('tallas.edit' , $talla->id )}}" class="glyphicon glyphicon-pencil btn btn-warning"></a>

              </td>
            </tr>
           @endforeach
          </tbody>
        </table>

    <center>
      {{ $tallas->links() }} 
    </center>
        

      </div>
        
      </div>

   </div>
 </div>  
</div><!-- /.container -->

 @endsection