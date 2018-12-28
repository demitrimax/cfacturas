<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::number('cliente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Id Field -->
<div class="form-group">
    {!! Form::label('direccion_id', 'Direccion Id:') !!}
    {!! Form::number('direccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    {!! Form::number('empresa_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('concepto', 'Concepto:') !!}
    {!! Form::text('concepto', null, ['class' => 'form-control']) !!}
</div>

<!-- Metodopago Id Field -->
<div class="form-group">
    {!! Form::label('metodopago_id', 'Metodopago Id:') !!}
    {!! Form::number('metodopago_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicionpago Id Field -->
<div class="form-group">
    {!! Form::label('condicionpago_id', 'Condicionpago Id:') !!}
    {!! Form::number('condicionpago_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Complementopago Id Field -->
<div class="form-group">
    {!! Form::label('complementopago_id', 'Complementopago Id:') !!}
    {!! Form::number('complementopago_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Id Field -->
<div class="form-group">
    {!! Form::label('estatus_id', 'Estatus Id:') !!}
    {!! Form::number('estatus_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Comprobante Field -->
<div class="form-group">
    {!! Form::label('comprobante', 'Comprobante:') !!}
    {!! Form::text('comprobante', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('facturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
