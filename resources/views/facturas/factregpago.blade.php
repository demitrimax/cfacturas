@extends('layouts.app')
@section('title',config('app.name').' | Registrar Pago de Facturas' )

@section('content')
<section class="content-header">
    <h1>
        <i class="fa fa-file-text-o"></i> Registrar pago de factuas
    </h1>
</section>
<div class="content">
  <div class="panel panel-primary">
    <div class="panel-heading">Datos del Pago</div>
    <div class="panel-body">
      {!! Form::open(['url' => ['facturas/guadar/pago'], 'method' => 'post' ]) !!}
      <!-- Cliente Id Field -->
      <div class="form-group col-md-4">
          {!! Form::label('factura', 'Factura:*') !!}
          {!! Form::text('factura', $factura->foliofac, ['class' => 'form-control', 'placeholder' => 'Id de Factura', 'required', 'readonly']) !!}
          {!! Form::hidden('factura_id',$factura->id)!!}
      </div>
      <div class="form-group col-md-4">
          {!! Form::label('monto', 'Monto:*') !!}
          {!! Form::text('monto', number_format($factura->total,2), ['class' => 'form-control', 'placeholder' => 'Id de Factura', 'required', 'readonly']) !!}
      </div>
      <div class="form-group col-md-4">
          {!! Form::label('fecha', 'Fecha:*') !!}
          {!! Form::date('fecha', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Fecha', 'required', 'readonly']) !!}
      </div>
      <div class="form-group col-md-4">
          {!! Form::label('acuerdo', 'Acuerdo:*') !!}
          {!! Form::text('acuerdo', $factura->acuerdo->numacuerdo, ['class' => 'form-control', 'placeholder' => 'Acuerdo Comercial', 'required', 'readonly']) !!}
      </div>

      <div class="form-group col-md-4">
        {!! Form::label('comision', 'Porcentaje de Comisión:*') !!}
        <div class="input-group">
                  <span class="input-group-addon">%</span>
                  {!! Form::text('comision', number_format($factura->acuerdo->ac_principalporc,2), ['class' => 'form-control', 'placeholder' => 'Porcentaje de comisión', 'required', 'readonly']) !!}
        </div>
      </div>
      <div class="form-group col-md-4">
          {!! Form::label('empresa', 'Empresa:*') !!}
          {!! Form::text('empresa', $factura->empresa->nombre, ['class' => 'form-control', 'placeholder' => 'Empresa Emisora', 'required', 'readonly']) !!}
      </div>
      <div class="form-group col-md-4">
          {!! Form::label('cuenta', 'Cuenta Bancaria:*') !!}
          {!! Form::select('cuenta', $cuentas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una cuenta', 'required']) !!}
      </div>
      @if($factura->acuerdo->sociocomer)
      <div class="form-group col-md-4">
          {!! Form::label('sociocomericial', 'Socio Comercial:*') !!}
          {!! Form::text('sociocomercial', $factura->acuerdo->sociocomer->nombre, ['class' => 'form-control', 'placeholder' => 'Socio Comercial', 'required', 'readonly']) !!}
      </div>
      @endif
      <!-- Empresa Id Field -->
      <div class="form-group col-md-12">
          {!! Form::label('comprobante', 'comprobante:*') !!}
          {!! Form::file('comprobamte', null, ['class' => 'form-control', 'placeholder'=>'Seleccione el archivo del comprobante', 'required']) !!}
      </div>
    </div>
    <div class="panel-footer">
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Registrar Pago">
        <a href="{{url('facturas')}}" class="btn btn-default">Cancelar</a>
    </div>
  </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
