    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="{{asset('favicon/favicon-96x96.png')}}" height="30" width="30"> Solicitud Factura
          <small class="pull-right">Fecha: {{$solicitudes->created_at->format('d-m-Y')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-8 invoice-col">
        Para:
        <address>
          <strong>{{$solicitudes->empresafacturadora}}</strong><br>
        @if(!($solicitudes->empresafacturadora == "N/D"))
          {{$solicitudes->empfacturadora->rfc}}<br>
          {!!$solicitudes->empfacturadora->empdireccion!!}<br>
          {!! $solicitudes->empfacturadora->correo_notifica!!}
          <br>

        @endif
        </address>
      </div>
      <div class="col-sm-4 invoice-col pull-right">
          <img src="{{asset('img/logo_wide_black_small.png')}}" alt="LogoEmpresa" width="280" height="80">
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Cantidad</th>
            <th>U.Medida</th>
            <th>Unidad</th>
            <th>Clave Prod.</th>
            <th>Descripcion</th>
            <th>P. Unitario</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            @foreach($solicitudes->detsolicitud as $detallesol)
            <tr style="font-size: 10px;">
            <td>
              {{$detallesol->cantidad}}
            </td>
            <td>
              {{$detallesol->umedida}}
            </td>
            <td>
              {{$detallesol->unidad}}
            </td>
            <td>
                {{$detallesol->prodserv_id}}
            </td>
            <td>
                {{$detallesol->descripcion}}
            </td>
            <td>
                $ {{number_format($detallesol->punitario,2)}}
            </td>
            <td>
                ${{ number_format($detallesol->monto,2)}}
            </td>
            </tr>
            @endforeach
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Detalles:</p>
        <p> </p>
        <p><b>Uso de CFDI:</b> {{$solicitudes->usodecfdi->codigo.' '.$solicitudes->usodecfdi->descripcion }}</p>
          <p><b>Método de Pago:</b> {{$solicitudes->pagometodo->nombre }}</p>
          <p><b>Forma de Pago:</b> {{$solicitudes->formadepago->descripcion }}</p>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          La presente tiene como finalidad hacer una solicitud InterEmpresa a nombre de JM Corporativo por los conceptos aquí descritos.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Totales</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td class="pull-right">${{number_format($solicitudes->subtotal,2)}}</td>
            </tr>
            <tr>
              <th>IVA (16%)</th>
              <td class="pull-right">${{ number_format($solicitudes->iva,2) }}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td class="pull-right">${{ number_format($solicitudes->total,2) }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
