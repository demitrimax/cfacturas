@extends('layouts.app')

@section('title',config('app.name').' | Alta de Solicitud' )

@section('content')

  <div class="content">
    <h3>Enviar Solicitud</h3>
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
  {!! Form::open(['url' => 'solicitud', 'enctype'=>'multipart/form-data']) !!}
  <div class="panel panel-primary">
    <div class="panel-heading">Datos del Solicitante</div>
      <div class="panel-body">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:*') !!}
            {!! Form::text('nombre', Auth::user()->name, ['class' => 'form-control', 'maxlength' =>'150', 'required']) !!}
            {!! Form::hidden('fecha', date("Y-m-d")) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
        </div>
        <div class="form-group">
            {!! Form::label('correo', 'Correo Electronico:*') !!}
            {!! Form::email('correo', Auth::user()->email, ['class' => 'form-control', 'maxlength' =>'150', 'required', 'placeholder'=>'correo@electronico.com']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono', 'Teléfono:*') !!}
            {!! Form::text('telefono', null, ['class' => 'form-control', 'maxlength' =>'10', 'required', 'placeholder' => 'Teléfono']) !!}
        </div>

      </div>
  </div>
  <div class="panel panel-primary">
    <div class="panel-heading">Datos de la Solicitud</div>
    <div class="panel-body">
      <div class="form-group">
          {!! Form::label('rfc', 'RFC:*') !!}
          {!! Form::text('rfc', null, ['class' => 'form-control', 'maxlength' =>'150','placeholder'=>'RFC registrado', 'required']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('condicion', 'Condición de Pago:*') !!}
          {!! Form::select('condicion', ['Efectivo'=>'Efectivo','Credito' =>'Credito','No Aplica' => 'No Aplica', 'Otro' =>'Otro'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('metodo', 'Metodo de Pago:*') !!}
          {!! Form::select('metodo', ['PPD'=>'PPD','PUE' =>'PUE'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
      </div>
      <div class="form-group">
          {!! Form::label('forma', 'Forma de Pago:*') !!}
          {!! Form::select('forma', ['Efectivo'=>'Efectivo','Cheque' =>'Cheque', 'Transferencia'=>'Transferencia','Por definir' => 'Por Definir'],null, ['class' => 'form-control','placeholder'=>'Seleccione uno', 'required']) !!}
      </div>
        <div class="form-group">
            {!! Form::label('concepto', 'Concepto:*') !!}
            {!! Form::textarea('concepto', null, ['class' => 'form-control']) !!}
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

    </div>
    <div class="form-group">
        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! url('/') !!}" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</div>



{!! Form::close() !!}
</div>
@endsection
