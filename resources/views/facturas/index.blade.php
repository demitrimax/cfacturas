@extends('layouts.app')
@section('title',config('app.name').' | Facturas' )

@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/iCheck/skins/all.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-file-text-o"></i> Facturas</h1>
        <h1 class="pull-right">
          <div class="margin">
          <div class="btn-group">
          @can('facturas-create')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('facturas.create') !!}">Agregar Nueva Factura</a>
          @endcan
          @can('facturas-createxml')
           <button class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-uploadxml">Cargar XML CFDI v3.3</button>
          @endcan
          @can('facturas-generate')
          <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-facturagenerate">Generar Factura</button>
          @endcan
          </div>
        </div>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('facturas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


@can('facturas-createxml')

<div class="modal fade" id="modal-uploadxml">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cargar Factura desde XML</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['url' => 'facturaxml/save', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

              <p> Para cargar un XML de una factura porfavor, seleccione primero el acuerdo al que se le asignará la factura.<p>
              <!-- combobox de acuerdos comerciales -->
              <div class="form-group col-sm-12 col-lg-12">
                  {!! Form::label('acuerdo', 'Acuerdo Comercial:') !!}
                  {!! Form::select('acuerdo', $acuerdos, null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione un acuerdo','required']) !!}
              </div>

              <!-- fileinput carga de XML -->
              <div class="form-group col-sm-12 col-lg-12">
                  {!! Form::label('archivo', 'Archivo XML:') !!}
                  {!! Form::file('archivo', ['class' => 'form-control', 'required', 'accept'=>'text/xml' ]) !!}
              </div>

                <div class="form-group col-sm-12 col-lg-12">
                {!! Form::hidden('redirect', 'facturas.index') !!}
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="subdatfiscales">Cargar XML</button>
        </div>
        {!! Form::close() !!}
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
  @endcan

  @can('facturas-generate')
  <div class="modal fade" id="modal-facturagenerate">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Generar Nueva Factura</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'facturas/generate/create', 'method'=>'get', 'enctype'=>'multipart/form-data']) !!}

                <p> Para generar un nueva factura por favor seleccione los siguiente.<p>
                <!-- combobox de acuerdos comerciales -->
                <!-- Cliente Id Field -->
                <div class="form-group">
                    {!! Form::label('cliente_id', 'Cliente:*') !!}
                    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccione un cliente', 'required', 'style'=>'width: 100%;']) !!}
                </div>

                <!-- Acuerdo Comercial Id Field -->
                <div class="form-group">
                    {!! Form::label('accomercial_id', 'Acuerdo Comercial:*') !!}
                    {!! Form::select('accomercial_id', [], null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione un Acuerdo', 'required', 'style'=>'width: 100%;']) !!}
                </div>

                <!-- Empresa Id Field -->
                <div class="form-group">
                    {!! Form::label('empresa_id', 'Empresa:*') !!}
                    {!! Form::select('empresa_id', [], null, ['class' => 'form-control select2', 'placeholder'=>'Seleccione una Empresa', 'required', 'style'=>'width: 100%;']) !!}
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="subdatfiscales">Empezar</button>
          </div>
          {!! Form::close() !!}
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
  @endcan

  @section('scripts')

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
    $.get('{{url('facturas/GetAcuerdosCliente')}}/'+cliente_id, function(data) {
      //exito al obtener los datos
      console.log(data);
      $('#accomercial_id').empty();
      $('#accomercial_id').append('<option value ="0">Seleccione una opción</option>' );
      $.each(data, function(index, acuerdo) {
        $('#accomercial_id').append('<option value ="' + acuerdo.id + '">'+acuerdo.numacuerdo+'</option>' );
      });
    });
  });

  $('#accomercial_id').on('change', function(e) {
    //console.log(e);
    var acuerdo_id = e.target.value;
    //ajax
    $.get('{{url('facturas/GetEmpresasAcuerdo')}}/'+acuerdo_id, function(data) {
      //exito al obtener los datos
      console.log(data);
      $('#empresa_id').empty();
      $.each(data, function(index, empresa) {
        $('#empresa_id').append('<option value ="' + empresa.id + '">'+empresa.nombre+'</option>' );
      });
    });
  });
  </script>
  @stack('scripts')
  @endsection
