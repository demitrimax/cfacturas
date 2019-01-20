
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $sociocomercial->nombre !!}</p>
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    <p>{!! $sociocomercial->RFC !!}</p>
</div>

<!-- Curp Field -->
<div class="form-group">
    {!! Form::label('CURP', 'CURP:') !!}
    <p>{!! $sociocomercial->CURP !!}</p>
</div>


<!-- Persfisica Field -->
<div class="form-group">
    {!! Form::label('persfisica', 'Persfisica:') !!}
    <p>{!! $sociocomercial->persfisica !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $sociocomercial->direccion !!}</p>
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{!! $sociocomercial->correo !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $sociocomercial->telefono !!}</p>
</div>

<!-- Porcentaje de Comisión Field -->
<div class="form-group">
    {!! Form::label('comision', 'Porcentaje de Comisión:') !!}
    <p>{!! $sociocomercial->comision !!}%</p>
</div>
