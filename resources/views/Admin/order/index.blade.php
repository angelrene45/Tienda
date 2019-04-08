@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="glyphicon glyphicon-shopping-cart"></i> PEDIDOS
            </h1>
        </div>
        
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Ver Detalle</th>
                            <th>Eliminar</th>
                            <th>Fecha</th>
                            <th>Usuario</th>
                            <th>Subtotal</th>
                            <th>Envio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordenes as $order)
                            <tr>
                                <td>
                                    <a 
                                        href="{{route('admin.order.getItems', $order->id)}}" 
                                        class="btn btn-primary glyphicon glyphicon-list"
                                    >
                                        
                                    </a>
                                </td>
                                <td>

        							<form action="{{route('admin.order.destroy' , $order->id)}}" method="POST" role="form" autocomplete="off" enctype="multipart/form-data">                                          
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                                       
                                    </form>

                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>${{ number_format($order->subtotal,2) }}</td>
                                <td>${{ number_format($order->envio,2) }}</td>
                                <td>${{ number_format($order->subtotal + $order->envio,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            
             {{ $ordenes->links() }} 
            
        </div>
    </div>
    
@endsection
