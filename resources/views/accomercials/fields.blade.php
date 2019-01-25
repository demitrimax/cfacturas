@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/iCheck/skins/all.css')}}">
@endsection


<!-- Fechasolicitud Field -->
<div class="form-group">
    {!! Form::label('fechasolicitud', 'Fecha de Solicitud:*') !!}
    {!! Form::date('fechasolicitud0', date("Y-m-d"), ['class' => 'form-control', 'required', 'disabled']) !!}
    {!! Form::hidden('fechasolicitud', date("Y-m-d")) !!}
</div>

<!-- Checlbox Requiere Socio Comercial Field -->
<div class="form-group">
    <label class="checkbox-inline">
        {!! Form::hidden('rsocio', false) !!}
        {!! Form::checkbox('rsocio', '1', 1, ['onclick'=>'reqsocio(this)']) !!}
        {!! Form::label('roscoio', 'Requiere Socio Comercial') !!}
    </label>
</div>
<div id="requieresocio">
<!-- Sociocomer Id Field -->
  <div class="form-group">
      {!! Form::label('sociocomer_id', 'Socio Comercial:') !!}
      {!! Form::select('sociocomer_id', $sociocomer, null, ['class' => 'form-control select2', 'style'=>'width: 100%;','placeholder'=>'Seleccione uno', 'required']) !!}
  </div>

  <!-- Sociocomer Id Field -->
  <div class="form-group">
      {!! Form::label('asoc_comision', 'Comisión Socio:') !!}
      <div class="input-group">
          <span class="input-group-addon">Comisión Socio:</span>
        {!! Form::number('asoc_comision', null, ['class' => 'form-control', 'step'=>'0.01', 'max' => '15.00', 'placeholder'=>'Porcentaje comisionable']) !!}
        <span class="input-group-addon">%</span>
    </div>
  </div>
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente:*') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control select2', 'style'=>'width: 100%;', 'required', 'placeholder'=>'Seleccione uno']) !!}
</div>


<!-- Empresas Asociadas al Acuerdo Comercial -->
<div class="form-group">
    {!! Form::label('empresasasoc', 'Empresa(s) Facturadoras(s):*') !!}
    {!! Form::select('empresasasoc[]', $empresas, null, ['class' => 'form-control select2', 'required', 'multiple'=>'multiple', 'data-placeholder'=>'Seleccione una empresa', 'style'=>'width: 100%;']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:*') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Informacion Field -->
<div class="form-group">
    {!! Form::label('informacion', 'Observaciones:') !!}
    {!! Form::text('informacion', null, ['class' => 'form-control', 'maxlength' =>'150']) !!}
</div>

<!-- Ac Principalporc Field -->
<div class="form-group">
{!! Form::label('ac_principalporc', 'Porcentaje Principal:*') !!}
<div class="input-group">
    <span class="input-group-addon">Porcentaje Principal:*</span>
    {!! Form::number('ac_principalporc', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'max' => '15.00', 'min'=>'0.09']) !!}
    <span class="input-group-addon">%</span>
</div>
</div>

<!-- Ac Secundarioporc Field -->
<div class="form-group">
    {!! Form::label('ac_secundarioporc', 'Porcentaje Secundario:') !!}
    <div class="input-group">
        <span class="input-group-addon">Porcentaje Secundario:*</span>
    {!! Form::number('ac_secundarioporc', null, ['class' => 'form-control', 'step'=>'0.01', 'max' => '15.00', 'min'=>'0.09']) !!}
    <span class="input-group-addon">%</span>
</div>
</div>

<!-- Base del porcentaje Field -->
<div class="form-group">
    {!! Form::label('base', 'Base del porcentaje:') !!}
    {!! Form::select('base', ['SUBTOTAL'=>'SUBTOTAL','DEVOLUCION'=>'DEVOLUCION','TOTAL'=>'TOTAL'],null, ['class' => 'form-control', 'required', 'placeholder'=>'Seleccione']) !!}
</div>

<!-- Elab User Id Field -->
<div class="form-group">
    {!! Form::label('elab_user_id', 'Usuario que Elabora:*') !!}
    {!! Form::select('elab_user_id', $usuarios, Auth::user()->id, ['class' => 'form-control', 'readonly','required', 'onsubmit'=>'enableElabUser();' ]) !!}
    <!-- {!! Form::hidden('elab_user_id', Auth::user()->id) !!} -->
</div>


<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accomercials.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminlte/bower_components/iCheck/icheck.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});


$('#sociocomer_id').on('change', function(e) {
  //console.log(e);
  var sociocomer_id = e.target.value;
  //ajax
  $.get('/GetComisiones/'+sociocomer_id, function(data) {
    //exito al obtener los datos
    console.log(data);
    $('#asoc_comision').val(data[0]['comision']);
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

//habilitar el select
function enableElabUser() {
  document.getElementById('elab_user_id').disabled=false;
}

//checkbox requiere socio comercial
function reqsocio(cheked) {
     reqsocioe = document.getElementById('requieresocio');
     var checkfield = cheked.checked;
    console.log(checkfield);
  if (checkfield == true){
    reqsocioe.style.display ='block';
    document.getElementById("sociocomer_id").required = true;
  }
  else
  {
    reqsocioe.style.display = 'none';
    document.getElementById("sociocomer_id").required = false;
    document.getElementById("sociocomer_id").selectedIndex = "0";
    document.getElementById("asoc_comision").value = null;
  }

}

</script>

@endsection
