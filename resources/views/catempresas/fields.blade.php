@can('empresas-propias')
<div class="form-group">
    <label class="checkbox-inline">
        {!! Form::hidden('propia', false) !!}
        {!! Form::checkbox('propia', '1', null, ['class'=>'flat-red']) !!} {!! Form::label('propia', 'Empresa Propia') !!}
    </label>
</div>
@endcan
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Alias de la Empresa:*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'length'=>'150', 'placeholder'=>'Alias de la empresa', 'required']) !!}
</div>

<!-- Correo Factura Field -->
<div class="form-group">
    {!! Form::label('correo_factura', 'Correo de Facturas:') !!}
    {!! Form::email('correo_factura', null, ['class' => 'form-control', 'placeholder'=>'correo@factuas.com']) !!}
</div>

<!-- Correo Notifica Field -->
<div class="form-group">
    {!! Form::label('correo_notifica', 'Correo de Notificaciones:*') !!}
    {!! Form::email('correo_notifica', null, ['class' => 'form-control', 'placeholder'=>'correo@notificaciones.com', 'required']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:*') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder'=>'9999000000', 'length'=>'15', 'required']) !!}
</div>

<!-- Comision Field -->


<div class="input-group">
    <span class="input-group-addon">Porcentaje de Comisión</span>
    {!! Form::number('comision', null, ['class' => 'form-control', 'step'=>'0.01', 'placeholder'=>'5.1']) !!}
    <span class="input-group-addon">%</span>
</div>

<div class="box-footer">
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
