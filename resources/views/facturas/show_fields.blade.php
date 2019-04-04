<div class="panel panel-default col-md-6">
  <div class="panel-heading">Panel General</div>
  <div class="panel-body">
    <table class="table table-striped table-bordered detail-view">
  <tbody>
    <tr>
      <th>{!! Form::label('cliente_id', 'Cliente:') !!}</th>
      <td>{!! $facturas->cliente->nombre !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('empresa_id', 'Empresa:') !!}</th>
      <td>{!! $facturas->empresa->nombre !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('acuerdo_id', 'Acuerdo Comercial No.:') !!}</th>
      <td>{!! $facturas->acuerdo->numacuerdo !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('fecha', 'Fecha:') !!}</th>
      <td>{!! $facturas->fecha->format('d-M-Y') !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('observaciones', 'Observaciones:') !!}</th>
      <td>{!! $facturas->observaciones !!}</td>
    </tr>

    </tbody>
  </table>

    </div>
  </div>

<div class="panel panel-default col-md-6">
  <div class="panel-heading">Información Factura</div>
  <div class="panel-body">
    <!-- Metodopago Id Field -->
    <div class="form-group">
        {!! Form::label('metodopago_id', 'Método de pago:') !!}
        <p>{!! $facturas->pagoMetodo->nombre !!}</p>
    </div>

    <!-- Condicionpago Id Field -->
    <div class="form-group">
        {!! Form::label('condicionpago_id', 'Forma de pago:') !!}
        <p>{!! $facturas->pagoForma->descripcion !!}</p>
    </div>


    <!-- Comprobante Field -->
    <div class="form-group">
        {!! Form::label('comprobante', 'Comprobante de Factura:') !!}
        <p><a href="comprobante/{!! $facturas->id !!}"> {!! $facturas->comprobante !!}</a></p>
    </div>
  </div>
</div>
