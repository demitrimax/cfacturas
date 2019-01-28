<div class="panel panel-default col-md-6">
  <div class="panel-heading">Panel General</div>
  <div class="panel-body">
    <div class="list-group">
      <a href="#" class="list-group-item active">
        <h4 class="list-group-item-heading">{!! Form::label('cliente_id', 'Cliente:') !!}</h4>
        <p class="list-group-item-text">{!! $facturas->cliente->nombre !!}</p>
      </a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{!! Form::label('empresa_id', 'Empresa:') !!}</h4>
        <p class="list-group-item-text">{!! $facturas->empresa->nombre !!}</p>
      </a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{!! Form::label('acuerdo_id', 'Acuerdo Comercial No.:') !!}</h4>
        <p class="list-group-item-text">{!! $facturas->acuerdo->numacuerdo !!}</p>
      </a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{!! Form::label('fecha', 'Fecha:') !!}</h4>
        <p class="list-group-item-text">{!! $facturas->fecha->format('d-M-Y') !!}</p>
      </a>
      <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading">{!! Form::label('observaciones', 'Observaciones:') !!}</h4>
        <p class="list-group-item-text">{!! $facturas->observaciones !!}</p>
      </a>
    </div>
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
