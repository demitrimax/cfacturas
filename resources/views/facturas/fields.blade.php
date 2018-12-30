<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un cliente', 'required']) !!}
</div>

<!-- Direccion Id Field -->
<div class="form-group">
    {!! Form::label('direccion_id', 'RFC:') !!}
    {!! Form::select('direccion_id', $direcciones, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione un RFC', 'required']) !!}
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione una Empresa', 'required']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('concepto', 'Concepto:') !!}
    {!! Form::text('concepto', null, ['class' => 'form-control', 'required', 'maxlength'=>'190']) !!}
</div>

<!-- Metodopago Id Field -->
<div class="form-group">
    {!! Form::label('metodopago_id', 'Método de Pago:') !!}
    {!! Form::select('metodopago_id', $pagometodo, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Condicionpago Id Field -->
<div class="form-group">
    {!! Form::label('condicionpago_id', 'Condicion de pago:') !!}
    {!! Form::select('condicionpago_id', $pagocondicion, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Complementopago Id Field -->
<div class="form-group">
    {!! Form::label('complementopago_id', 'Complementopago Id:') !!}
    {!! Form::number('complementopago_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control', 'step'=>'0.01', 'min'=>0, 'required']) !!}
</div>
<!-- IVA Field -->
<div class="form-group">
    {!! Form::label('iva', 'IVA:') !!}
    {!! Form::number('iva', null, ['class' => 'form-control', 'step'=>'0.01', 'min'=>0, 'required']) !!}
</div>
<!-- TOTAL Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control', 'step'=>'0.01', 'min'=>0, 'required']) !!}
</div>

<!-- Estatus Id Field -->
<div class="form-group">
    {!! Form::label('estatus_id', 'Estatus Id:') !!}
    {!! Form::select('estatus_id', $facestatus, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Comprobante Field -->
<div class="form-group">
    {!! Form::label('comprobante', 'Comprobante:') !!}
    {!! Form::file('comprobante', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('facturas.index') !!}" class="btn btn-default">Cancel</a>
</div>
