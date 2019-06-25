<form id="form-actualizar"  method="POST" role="form" autocomplete="off" enctype="multipart/form-data">
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
      </select>
  </div>

  <hr>
  <button type="submit" class="btn btn-primary btn-actualizar">Actualizar</button>
</form>
