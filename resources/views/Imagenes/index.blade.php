 @extends('layouts.app')

  @section('imagenes')
    active
  @endsection

  @section('content')
	<div class="container">
      
          

    		<div class="row">
    		@foreach($imagenes as $imagen)
    		 <div class="col-md-4">
					<div class="panel panel-default">
				        <!-- Default panel contents -->
				        <div class="panel-heading"></div>
				        <div class="panel-body">

                
                  <img src="{{ URL::to('/') }}/images/productos/{{$imagen->imagen}}"  width="320" height="340" alt="{{$imagen->producto->nombre}}">
                 


				        </div>
				        <div class="panel-footer">
				        	<center>{{$imagen->producto->nombre}}</center>
				        </div>
           		 	</div> 
    		 </div>
    		@endforeach
    	   </div>
           

        

    </div><!-- /.container -->
  @endsection