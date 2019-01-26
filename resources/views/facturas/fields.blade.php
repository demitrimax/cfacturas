<div class="panel panel-default">
  <div class="panel-heading">Datos del Acuerdo</div>
  <div class="panel-body">
    <!-- Cliente Id Field -->
    <div class="form-group">
        {!! Form::label('cliente_id', 'Cliente:') !!}
        {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un cliente', 'required', 'style'=>'width: 100%;']) !!}
    </div>

    <!-- Acuerdo Comercial Id Field -->
    <div class="form-group">
        {!! Form::label('accomercial_id', 'Acuerdo Comercial:') !!}
        {!! Form::select('accomercial_id', [''],null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione un Acuerdo', 'required', 'style'=>'width: 100%;']) !!}
    </div>

    <!-- Empresa Id Field -->
    <div class="form-group">
        {!! Form::label('empresa_id', 'Empresa:') !!}
        {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione una Empresa', 'required', 'style'=>'width: 100%;']) !!}
    </div>
  </div>
</div>


<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('foliofac', 'Folio de factura:') !!}
    {!! Form::text('foliofac', null, ['class' => 'form-control', 'required', 'maxlength'=>'35']) !!}
</div>

<!-- Concepto Field -->
<div class="form-group">
    {!! Form::label('concepto', 'Observaciones:') !!}
    {!! Form::text('concepto', null, ['class' => 'form-control', 'required', 'maxlength'=>'190']) !!}
</div>

<!-- Metodopago Id Field -->
<div class="form-group">
    {!! Form::label('metodopago_id', 'Método de Pago:') !!}
    {!! Form::select('metodopago_id', $pagometodo, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- forma de pago Id Field -->
<div class="form-group">
    {!! Form::label('formapago_id', 'Forma de pago:') !!}
    {!! Form::select('formapago_id', $pagoforma, null, ['class' => 'form-control', 'required']) !!}
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

@push('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminlte/bower_components/iCheck/icheck.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
$('#cliente_id').on('change', function(e) {
  //console.log(e);
  var cliente_id = e.target.value;
  //ajax
  $.get('/facturas/GetAcuerdosCliente/'+cliente_id, function(data) {
    //exito al obtener los datos
    console.log(data);
    $('#accomercial_id').empty();
    $.each(data, function(index, acuerdo) {
      $('#accomercial_id').append('<option value ="' + acuerdo.id + '">'+acuerdo.numacuerdo+'</option>' );
    });
  });
});
 $(function () {
//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})
//Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  checkboxClass: 'icheckbox_minimal-red',
  radioClass   : 'iradio_minimal-red'
})
//Flat red color scheme for iCheck
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
})
})
</script>
@endpush
