
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre Completo:') !!}
    <p>{!! $clientes->nombre." ".$clientes->apellidopat." ".$clientes->apellidomat !!}</p>
</div>

<!-- Apellidopat Field -->
<div class="form-group">
    {!! Form::label('apellidopat', 'Apellido Paterno:') !!}
    <p>{!! $clientes->apellidopat !!}</p>
</div>

<!-- Apellidomat Field -->
<div class="form-group">
    {!! Form::label('apellidomat', 'Apellido Materno:') !!}
    <p>{!! $clientes->apellidomat !!}</p>
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    <p>{!! $clientes->RFC !!}</p>
</div>

<!-- Curp Field -->
<div class="form-group">
    {!! Form::label('CURP', 'Curp:') !!}
    <p>{!! $clientes->CURP !!}</p>
</div>
