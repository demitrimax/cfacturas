
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
<!--
<div class="form-group">
    {!! Form::label('persfisica', 'Persona Física:') !!}
    {!! ($sociocomercial->persfisica == 1) ? '<span class="badge bg-blue"><i class="fa fa-check"></i></span>' : '<span class="badge bg-red"><i class="fa fa-close"></i></span>' !!}
</div>
-->

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
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
    <p>{!! $sociocomercial->comision !!}% {{$sociocomercial->base}}</p>
</div>
