@extends('layouts.app')
@section('title',config('app.name').' | Alta de Acuerdo Comercial' )
@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/iCheck/skins/all.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Alta de Acuerdo Comercial
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                    {!! Form::open(['route' => 'accomercials.store']) !!}

                        @include('accomercials.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
              <div class="box-body">
                @include('accomercials.informacion')
                {!! $blog->cuerpo !!}
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminlte/bower_components/iCheck/icheck.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
function sociocomercialremove(index)
{
  var sel = document.getElementById("cliente_id");
  sel.remove(index);
}

$('#cliente_id').on('change', function(e) {
  //console.log(e);
  var cliente_id = e.target.value;
  //ajax
  $.get('/GetDirecciones/'+cliente_id, function(data) {
    //exito al obtener los datos
    //console.log(data);
    $('#direccion_id').empty();
    $.each(data, function(index, direcciones) {
      $('#direccion_id').append('<option value ="' + direcciones.id + '">'+direcciones.razonsocial+'</option>' );
    });
  });
});

$('#cliente_id').on('change', function(e) {
  //console.log(e);
  var cliente_id = e.target.value;
  //ajax
  $.get('/GetCuentas/'+cliente_id, function(data) {
    //exito al obtener los datos
    //console.log(data);
    $('#cuenta_id').empty();
    $.each(data, function(index, cuenta) {
      $('#cuenta_id').append('<option value ="' + cuenta.id + '">'+cuenta.numcuenta+'</option>' );
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

@endsection
