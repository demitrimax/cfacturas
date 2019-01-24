@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
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
    {!! Form::label('nombre', 'Nombre de la Empresa:*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'length'=>'150', 'placeholder'=>'Nombre/Razón Social', 'required']) !!}
</div>

<!-- RFC Field -->
<div class="form-group">
    {!! Form::label('rfc', 'RFC:*') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control', 'length'=>'15', 'placeholder'=>'RFC', 'required']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:*') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder'=>'9999000000', 'length'=>'15', 'required']) !!}
</div>

<!-- Dirección Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'length'=>'120', 'placeholder'=>'Dirección']) !!}
</div>

<!-- Apodrado Legal Field -->
<div class="form-group">
    {!! Form::label('apoderadolegal', 'Apoderado Legal:') !!}
    {!! Form::text('apoderadolegal', null, ['class' => 'form-control', 'length'=>'120', 'placeholder'=>'Apoderado Legal']) !!}
</div>

<!-- Giro de la Empresa Field -->
<div class="form-group">
    {!! Form::label('giroempresa', 'Giro Empresa:') !!}
    {!! Form::select('giroempresa', $giro, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione un giro', 'required']) !!}
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

<!-- Comision Field -->
<div class="input-group">
    <span class="input-group-addon">Porcentaje de Comisión</span>
    {!! Form::number('comision', null, ['class' => 'form-control', 'step'=>'0.01', 'placeholder'=>'Porcentaje de Comision']) !!}
    <span class="input-group-addon">%</span>
</div>

<div class="box-footer">
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
