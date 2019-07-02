<form id="form-actualizar" action="{{route('admin.update.item')}}"  method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
{{csrf_field()}}

  <div class="form-group">
      <input class="hidden" type="text" id="idPedido" name="idPedido" value="{{$orden->id}}">

      <label for="comment">Estatus</label>
      <select class="form-control" id="estatus" name="estatus">
                  <option value="En validacion"
                  @if($orden->estatus == 'En validacion')
                      selected='selected'
                  @endif
                  >
                    En validacion
                  </option>
                  <option value="Validada"
                  @if($orden->estatus == 'Validada')
                      selected='selected'
                  @endif
                  >
                    Validada
                  </option>
                  <option value="En transito"
                  @if($orden->estatus == 'En transito')
                      selected='selected'
                  @endif
                  >
                    En transito
                  </option>
                  <option value="Completa"
                  @if($orden->estatus == 'Completa')
                      selected='selected'
                  @endif
                  >
                    Completa
                  </option>
      </select>
  </div>


  <div class="form-group">
      <label for="comment">Guias</label>
      <textarea class="form-control" rows="10" id="guias" name="guias">{{$orden->guias}}</textarea>
  </div>


  @if(count($orden->orden_pdf)>0)
    <label for="comment">Archivos</label>
    <div class="row">
    @foreach($orden->orden_pdf as $pdf)

        <div class="col-md-2 {{$pdf->id}}">
          <h1 class="text-center">
            <div class="dropdown">
              <button class="btn btn-danger glyphicon glyphicon-save-file" data-toggle="dropdown">
              </button>
              <ul class="dropdown-menu">
                <li><a href="{{route('admin.order.downloadPdf',$pdf->nombre_pdf)}}">Descargar</a></li>
                <li>
                    <a onClick="eliminarPdf('{{$pdf->nombre_pdf}}','{{$pdf->id}}')">
                        Eliminar
                    </a>
                 </li>
              </ul>
            </div>
          </h1>

          <small for="comment">{{str_limit($pdf->nombre_pdf, '15')}}</small>
        </div>

    @endforeach
    </div>

  @endif

@if(count($orden->orden_pdf)<=5)
<br>
  <div class="form-group">
      <input input type="file" id="pdfs" name="pdfs[]" enctype="multipart/form-data" multiple>
      <p class="help-block">Maximo 6</p>
       @if ($errors->has('pdfs'))
         <span class="help-block">
           <strong>{{ $errors->first('pdfs') }}</strong>
         </span>
      @endif
  </div>
@endif


  <hr>
  <button type="submit" class="btn btn-primary btn-actualizar">Actualizar</button>
</form>
