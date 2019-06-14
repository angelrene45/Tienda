<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cotizacion</title>
    <link rel="stylesheet" type="text/css" href="css/cotizacionpdf.css">
    <!--  <link rel="stylesheet" type="text/css" href="{{ asset('css/cotizacionpdf.css')}}">-->
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{public_path('images/shel-logo.png')}}" style="width:250px; max-width:300px;">
                            </td>

                            <td class="item-right">
                                Fecha: <br>
                                {{Carbon\Carbon::now()->format('d-m-Y')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Shel Seguridad e Higiene S.A. de C.V.<br>
                                12345 Sunny Road<br>
                                Guadalajara Jal, CA 12345
                            </td>

                            <td class="item-right">
                                Sanvik.<br>
                                {{ Auth::user()->name }}<br>
                                {{ Auth::user()->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
      <!--Tabla MXN -->
        <table cellpadding="0" cellspacing="0">
          <tr class="heading">
              <td>Imagen</td>
              <td>Código</td>
              <td>Precio</td>
              <td>Cantidad</td>
              <td class="item-right">Subtotal</td>
          </tr>

          @foreach($carrito as $item)
            @if($item->moneda == "MXN")
              <tr class="item">
                <td>
                  @if($item->imagen == NULL)
                      <img src="{{public_path('images/image-unavailable.png')}}" alt="BTS" width="50" height="50">
                    @else
                      <img src="{{public_path('images/productos/')}}{{$item->imagen->imagen}}" alt="BTS" width="50" height="50">
                  @endif
                </td>
                <td>{{$item->codigo}}</td>
                <td>${{number_format($item->precio,2)}} <small class="small">{{$item->moneda}}</small></td>
                <td class="item-center">{{$item->cantidad}}</td>
                <td class="item-right">${{number_format($item->precio*$item->cantidad,2)}} <small class="small">{{$item->moneda}}</small></td>
              </tr>
            @endif
          @endforeach
          <tr class="total">
               <td></td>
               <td></td>
               <td></td>
               <td></td>

               <td>
                  Total: ${{$totalMXN}} <small class="small">MXN</small>
               </td>
           </tr>
        </table>
      <!--Fin MXN -->

      <br>

      <!--Tabla MXN -->
        <table cellpadding="0" cellspacing="0">
          <tr class="heading">
              <td>Imagen</td>
              <td>Código</td>
              <td>Precio</td>
              <td>Cantidad</td>
              <td class="item-right">Subtotal</td>
          </tr>

          @foreach($carrito as $item)
            @if($item->moneda == "USD")
              <tr class="item">
                <td>
                  @if($item->imagen == NULL)
                      <img src="{{public_path('images/image-unavailable.png')}}" alt="BTS" width="50" height="50">
                    @else
                      <img src="{{public_path('images/productos/')}}{{$item->imagen->imagen}}" alt="BTS" width="50" height="50">
                  @endif
                </td>
                <td>{{$item->codigo}}</td>
                <td>${{number_format($item->precio,2)}} <small class="small">{{$item->moneda}}</small></td>
                <td class="item-center">{{$item->cantidad}}</td>
                <td class="item-right">${{number_format($item->precio*$item->cantidad,2)}} <small class="small">{{$item->moneda}}</small></td>
              </tr>
            @endif
          @endforeach
          <tr class="total">
               <td></td>
               <td></td>
               <td></td>
               <td></td>

               <td>
                  Total: ${{$totalUSD}} <small class="small">USD</small>
               </td>
           </tr>
        </table>
      <!--Fin USD-->
    </div>

</body>
</html>
