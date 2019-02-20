@extends('layouts.app')

@section('title',config('app.name').' | Modificar Solicitud' )

@section('css')
<script src="{{asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
<link rel="stylesheet" href="{{asset('adminlte/bower_components/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}">
<!-- select 2-->
<!--<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" /> -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"/>
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/ajaxautocomplete/dist/css/ajax-bootstrap-select.css')}}"/>
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/icheck/skins/all.css')}}">
@endsection

@section('content')

  <div class="content">
    <h3>Modificar Solicitud</h3>
    @if ($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   @endif
   @if( session('mensaje'))
   <div class="alert alert-success" role="alert">
       <a href="#" class="alert-link"> {{ session('mensaje') }}</a>
  </div>
   @endif
   {!! Form::model($solicitudes, ['route' => ['solfact.update', $solicitudes->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
  <div class="panel panel-primary">
    <div class="panel-heading">Elabora</div>
      <div class="panel-body">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:*') !!}
            {!! Form::text('nombre', Auth::user()->name, ['class' => 'form-control', 'maxlength' =>'150', 'required', 'readonly']) !!}
            {!! Form::hidden('fecha', date("Y-m-d")) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
        </div>

      </div>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">Datos de la Solicitud</div>
    <div class="panel-body">
      <div class="form-group">
          {!! Form::label('rfc', 'RFC:*') !!}
          {!! Form::select('rfc', $clientes, null, ['class' => 'form-control select2', 'style'=>'width:100%' ,'maxlength' =>'13','placeholder'=>'RFC registrado', 'required']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('usocfdi', 'Uso que se le dará al CFDI:*') !!}
          {!! Form::select('usocfdi', $usocfdi, null, ['class' => 'form-control select2', 'style'=>'width:100%', 'placeholder'=>'Seleccione uno', 'required']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('metodo', 'Metodo de Pago:*') !!}
          {!! Form::select('metodo', $metodo, null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('forma', 'Forma de Pago:*') !!}
          {!! Form::select('forma', $forma,null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
      </div>

    @include('solicitudes.tipofac2')

        <div class="form-group">
            {!! Form::label('concepto', 'Concepto:*') !!}
            {!! Form::textarea('concepto', 'REFERENCIA DE LA SOLICITUD', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('comentarios', 'Comentarios:') !!}
            {!! Form::textarea('comentarios', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('adjunto', 'Adjuntar:') !!}
            {!! Form::file('adjunto', null, ['class' => 'form-control']) !!}
        </div>

    </div>
    <div class="panel-footer">
    <div class="form-group">
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! url('/solfact') !!}" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</div>



{!! Form::close() !!}
</div>
@endsection
@section('scripts')
<!-- CK Editor -->
<script src="{{asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- <script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('adminlte/bower_components/numeral.js/min/numeral.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('concepto')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });
</script>
@stack('scripts')
@endsection
