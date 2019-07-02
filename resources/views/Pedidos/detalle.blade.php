 <div class="text-center">

   <div class="col-md-12">
     <p class="text-center">
       <a href="{{route('pedido.pdf',['id' => $orden->id])}}" class="btn btn-default">
         <span class="glyphicon glyphicon-file" aria-hidden="true"></span>Generar pdf
       </a>
     </p>
   </div>


   <div class="row">
     <div class="
         @if(Auth::user()->type == "purchaser")
           col-md-offset-3
         @endif col-md-6">
       <div class="table-responsive">
         <h3 class="labeltitle2">Datos del usuario</h3>
         <table class="table table table-striped table-hover table-bordered">
           <tr><td>Nombre:</td><td>{{$orden->user->name}}</td></tr>
           <tr><td>Correo:</td><td>{{$orden->user->email}}</td></tr>
         </table>
       </div>
     </div>


     @if(Auth::user()->type != "purchaser")
     <div class="col-md-6">
       <div class="table-responsive">
         <h3 class="labeltitle2">Datos del comprador</h3>
         <input type="hidden" id="compradorid" name="compradorid" value="{{$orden->comprador->id}}">
         <table class="table table table-striped table-hover table-bordered">
           <tr><td>Nombre:</td><td>{{$orden->comprador->name}}</td></tr>
           <tr><td>Correo:</td><td>{{$orden->comprador->email}}</td></tr>
         </table>
       </div>
     </div>
     @endif

     <div class="col-md-12">
       <div class="table-responsive">
         <h3 class="labeltitle2">Dirección</h3>
         <input type="hidden" id="direccionid" name="direccionid" value="{{$orden->direccion->id}}">
         <table class="table table table-striped table-hover table-bordered">
           <tr><td>{{$orden->direccion->calle}}, {{$orden->direccion->colonia}}, {{$orden->direccion->estado}}, {{$orden->direccion->municipio}}, {{$orden->direccion->codigo_postal}}</td></tr>
         </table>
       </div>
     </div>


   <div class="col-md-12 table-responsive">
     <h3 class="labeltitle2">Datos del Pedido</h3>
      <!--Tabla MXN-->
      <table class="table table-stripped table-bordered table-hover
        @if($totalMXN == 0)
          hidden
        @endif
      " id="table-detalle-pedido">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
        @foreach($item as $detalle)
          @if($detalle->moneda == "MXN")
            <tr>
                    <td>
                      @if(count($detalle->producto->imagenes) == 0)
    										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/image-unavailable.png"  alt="">
    									@else
    										<img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/productos/{{$detalle->producto->imagenes[0]->imagen}}"  alt="">
    									@endif
                    </td>
                    <td>
                       {{$detalle->producto->nombre}}
                    </td>
                    <td>
                       ${{$detalle->precio}} {{$detalle->moneda}}
                    </td>
                    <td>
                       {{$detalle->cantidad}}
                    </td>
                    <td>
                       ${{$detalle->cantidad * $detalle->precio}} {{$detalle->moneda}}
                    </td>
            <tr>
          @endif
        @endforeach
          <tr class="active">
            <td class="text-right" colspan="7"><h5>Total: ${{number_format($totalMXN,2)}} <span class="small">MXN</span></h5></td>
          </tr>
        </tbody>
      </table>
    </div>
      <!--Fin MXN -->

      <!--Tabla USD-->
      <div class="col-md-12 table-responsive">
        <table class="table table-stripped table-bordered table-hover
        @if($totalUSD == 0)
          hidden
        @endif
        " id="table-detalle-pedido">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
          @foreach($item as $detalle)
            @if($detalle->moneda == "USD")
              <tr>
                      <td>
                        @if(count($detalle->producto->imagenes) == 0)
                          <img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/image-unavailable.png"  alt="">
                        @else
                          <img class="center-block" height="80px" width="100px" src="{{ URL::to('/') }}/images/productos/{{$detalle->producto->imagenes[0]->imagen}}"  alt="">
                        @endif
                      </td>
                      <td>
                         {{$detalle->producto->nombre}}
                      </td>
                      <td>
                         ${{$detalle->precio}} {{$detalle->moneda}}
                      </td>
                      <td>
                         {{$detalle->cantidad}}
                      </td>
                      <td>
                         ${{$detalle->cantidad * $detalle->precio}} {{$detalle->moneda}}
                      </td>
              <tr>
            @endif
          @endforeach
            <tr class="active">
              <td class="text-right" colspan="7"><h5>Total: ${{number_format($totalUSD,2)}} <span class="small">USD</span></h5></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--Fin USD -->

      @if(!empty($orden->guias)>0)
        <div class="col-md-3">
          <div class="table-responsive">
            <h3 class="labeltitle2">Numero de Guias</h3>
            <textarea disabled class="form-control" rows="5" id="guias" name="guias">{{$orden->guias}}</textarea>
          </div>
        </div>
      @endif

      @if(count($orden->orden_pdf)>0)
        <div class="col-md-9">
          <div class="table-responsive">
            <h3 class="labeltitle2">Archivos</h3>
          </div>

        </div>
        @foreach($orden->orden_pdf as $pdf)

          <div class="col-md-2 {{$pdf->id}}">
            <h1 class="text-center">
              <div class="dropdown">
                <button title="{{$pdf->nombre_pdf}}" class="btn btn-danger glyphicon glyphicon-save-file" data-toggle="dropdown">
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{route('pedidos.downloadPdf',$pdf->nombre_pdf)}}">Descargar</a></li>
                </ul>
              </div>
            </h1>

            <small for="comment">{{str_limit($pdf->nombre_pdf, '15')}}</small>
          </div>

        @endforeach


      @endif

</div>
