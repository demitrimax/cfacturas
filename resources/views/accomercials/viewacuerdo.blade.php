
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-check-square"></i> {{ config('app.name')}} | Acuerdo Comercial
            <small class="pull-right">Fecha Solicitud: {{$accomercial->fechasolicitud->format('d-m-Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Cliente
          <address>
            <strong>{{$accomercial->cliente->nomcompleto}}</strong><br>
            {{$accomercial->direccion->razonsocial}}<br>
            {{$accomercial->direccion->calle.' '.$accomercial->direccion->numeroExt.' '.$accomercial->direccion->numeroInt}}<br>
            @foreach($accomercial->cliente->datcontacto as $datcontacto)
            {{$datcontacto->tipo.' : '.$datcontacto->contacto}}<br>
            @endforeach
            {{$accomercial->direccion->municipios->nomMunicipio.', '.$accomercial->direccion->estados->nombre}}<br>
          </address>
        </div>
        <!-- /.col -->

        <div class="col-sm-4 invoice-col">
        @if($accomercial->sociocomer_id)
          Asociado Comercial
          <address>
            <strong>{{ $accomercial->sociocomer->nomcompleto }}</strong><br>
            @foreach($accomercial->sociocomer->datcontacto as $datcontacto)
            {{$datcontacto->tipo.' : '.$datcontacto->contacto}}<br>
            @endforeach
            {{$accomercial->sociocomer->RFC}}<br>
          </address>
        @endif
        </div>

        <!-- /.col -->
        @if($accomercial->autorizado)
        <div class="col-sm-4 invoice-col">
          <b>AC No. #{{ date('y').str_pad($accomercial->id,3,"0",STR_PAD_LEFT) }}</b><br>
          <br>
          <b>Autorizado por:</b> {{ $accomercial->aut_user2_id}}<br>
          <b>Creado el: </b> {{ $accomercial->created_at->format('d/m/Y')}}<br>
          @if( $accomercial->created_at <> $accomercial->updated_at )
          <b>Actualizado el :</b> {{ $accomercial->updated_at->format('d/m/Y')}} <br>
          @endif
          <b>ID Folio:</b> {{ 'AC'.date('y') .'-'. str_pad($accomercial->id,3,"0",STR_PAD_LEFT) }}
        </div>
        @endif
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Empresa Alias</th>
              <th>Correo Notificaciones</th>
              <th>Correo Facturas</th>
              <th>Comisión</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($accomercial->empresasfact as $key=>$empresaria)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$empresaria->empresa->nombre}}</td>
              <td>{{$empresaria->empresa->correo_notifica}}</td>
              <td>{{$empresaria->empresa->correo_factura}}</td>
              <td>{{$empresaria->empresa->comision}}%</td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Descripción del Acuerdo:</p>
          <!--
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            {{$accomercial->descripcion}}
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Acuerdo de Comisiones</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Principal:</th>
                <td>{{$accomercial->ac_principalporc}}%</td>
              </tr>
              <tr>
                <th>Secundario</th>
                <td>{{$accomercial->ac_secundarioporc}}%</td>
              </tr>
              <!--
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            -->
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Elabora
          <address>
            <strong>{{$accomercial->elabuser->name}}</strong><br>
            <hr>
            <b>Firma</b>
            <br>
          </address>
        </div>
        <!-- /.col -->

        <div class="col-sm-4 invoice-col">
          Autoriza
          <address>
            <strong>$accomercial->sociocomer->nomcompleto </strong><br>
            <hr>
            <b>Firma</b>
          </address>
        </div>

        <!-- /.col -->

        <div class="col-sm-4 invoice-col">
          Asociado Comercial
          <address>
            <strong>$accomercial->sociocomer->nomcompleto </strong><br>
            <br>
          </address>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Enviar Copias Involucrados
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button>
        </div>
      </div>
    </section>
