@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('datatable/css/dataTables.bootstrap.min.css')}}" >
@endsection

@section('content')
        <div class="page-header">
            <h1 class="text-center labeltitle2">
                <i class="glyphicon glyphicon-shopping-cart"></i> PEDIDOS
            </h1>
        </div>

        <div class="page">

            <div class="table-responsive">
                <table id="pedidos" class="table table-striped table-hover table-bordered hidden">
                    <thead>
                        <tr>
                            <th># Compra</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Comprador</th>
                            <th>Estatus</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordenes as $order)
                            <tr>
                              <meta name="csrf-token" content="{{ csrf_token() }}">﻿
                                <td>{{ $order->id}}</td>
                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->comprador->name }}</td>
                                <td>{{ $order->estatus }}</td>
                                <td><a onClick="ver({{$order->id}})"  class="glyphicon glyphicon-eye-open" type="button"> </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>


        </div>

        <!-- Modal -->
        <div class="modal fade  bs-example-modal-lg" id="ModalPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal"></h4>
              </div>
              <div class="modal-body" id="bodyModal">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
@endsection

@section('scripts')
        <script src="{{asset('datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatable/js/dataTables.bootstrap.min.js')}}"></script>

        <script>

          $(document).ready(function() {

            var table = $('#pedidos').DataTable({
              "order": [[ 1, "desc" ]],
              language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Pedidos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            });

            $("table").removeClass("hidden"); //mostramos la tabla ya con la libreria de DataTable integrada

            //cuando se cierra el modal borra todo el codigo de BodyModal
            $('#ModalPedido').on('hidden.bs.modal', function () {
              $("#bodyModal").html("");
            });


          });//fin de on ready document

          function ver(idPedido){
            //peticion Ajax rellena el modal con el pedido seleccionado
            //pone el id de la factura en el titulo del modal
            $('#titleModal').text('Detalle del pedido ' + idPedido);

            $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

            $.ajax({
                url: '{{ url('pedidos/detalle') }}',
                type: 'post',
                dataType: 'JSON',
                data: {idPedido : idPedido},
                success: function(response){
                  //renderiza todo el html al modal
                  $("#bodyModal").html(response.html);
                },
                error: function(e){
                       console.log(e);
                }
            }).done(function(response){
                //mostramos el modal con los datos del pedido
                $('#ModalPedido').modal('show');
              }); //fin de la peticion Ajax
          }



        </script>
@endsection
