
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Alias Empresa:') !!}
    <p>{!! $catempresas->nombre !!}</p>
</div>

<!-- Correo Factura Field -->
<div class="form-group">
    {!! Form::label('correo_factura', 'Correo de Facturación:') !!}
    <p>{!! $catempresas->correo_factura !!}</p>
</div>

<!-- Correo Notifica Field -->
<div class="form-group">
    {!! Form::label('Correo_notifica', 'Correo Notificaciones:') !!}
    <p>{!! $catempresas->correo_notifica !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    <p>{!! $catempresas->telefono !!}</p>
</div>

<!-- Comision Field -->
<div class="form-group">
    {!! Form::label('comision', 'Porcentaje de Comision:') !!}
    <p>{!! $catempresas->comision !!} %</p>
</div>
