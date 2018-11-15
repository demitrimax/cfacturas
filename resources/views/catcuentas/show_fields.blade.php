
<!-- Banco Id Field -->
<div class="form-group">
    {!! Form::label('banco_id', 'Banco:') !!}
    <p>{!! $catcuentas->catBanco->nombre !!}</p>
</div>

<!-- Numcuenta Field -->
<div class="form-group">
    {!! Form::label('numcuenta', 'Numcuenta:') !!}
    <p>{!! $catcuentas->numcuenta !!}</p>
</div>

<!-- Clabeinterbancaria Field -->
<div class="form-group">
    {!! Form::label('clabeinterbancaria', 'Clabeinterbancaria:') !!}
    <p>{!! $catcuentas->clabeinterbancaria !!}</p>
</div>

<!-- Sucursal Field -->
<div class="form-group">
    {!! Form::label('sucursal', 'Sucursal:') !!}
    <p>{!! $catcuentas->sucursal !!}</p>
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    <p>{!! $catcuentas->nombrecliente !!}</p>
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    <p>{!! $catcuentas->nombreempresa !!}</p>
</div>

<!-- Swift Field -->
<div class="form-group">
    {!! Form::label('swift', 'Cuenta Swift:') !!}
    <p>{!! $catcuentas->swift !!}</p>
</div>
