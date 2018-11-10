<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre de la Empresa:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Factura Field -->
<div class="form-group">
    {!! Form::label('correo_factura', 'Correo de Facturas:') !!}
    {!! Form::text('correo_factura', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Notifica Field -->
<div class="form-group">
    {!! Form::label('correo_notifica', 'Correo de Notificaciones:') !!}
    {!! Form::text('correo_notifica', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Comision Field -->


<div class="input-group">
    <span class="input-group-addon">Porcentaje de Comisión</span>
    {!! Form::number('comision', null, ['class' => 'form-control']) !!}
    <span class="input-group-addon">%</span>
</div>

<div class="box-footer">
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>