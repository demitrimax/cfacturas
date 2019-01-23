
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Alias Empresa:') !!}
    <p>{!! $catempresas->nombre !!}</p>
</div>

<!-- RFC Field -->
<div class="form-group">
    {!! Form::label('rfc', 'RFC:') !!}
    <p>{!! $catempresas->rfc !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
    <p>{!! $catempresas->direccion !!}</p>
</div>

<!-- Apoderado Legal Field -->
<div class="form-group">
    {!! Form::label('apoderadolegal', 'Apoderado Legal:') !!}
    <p>{!! $catempresas->apoderadolegal !!}</p>
</div>

<!-- Giro de la Empresa Field -->
<div class="form-group">
    {!! Form::label('giroempresa', 'Giro de la Empresa:') !!}
    <p>{!! $catempresas->giroempresas !!}</p>
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
    <p>{!! number_format($catempresas->comision,2) !!} %</p>
</div>
