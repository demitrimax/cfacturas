@extends('layouts.app')
@section('title','Consorcio Comercial | '.$catempresas->nombre)
@section('content')
    @include('flash::message')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="content-header">
        <h1>
            Empresa {!! $catempresas->nombre !!}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('catempresas.show_fields')
                    <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    @can('empdatfiscales-list')
    <div class="content">
      <div class="box box-success">
          <div class="box-header">
            <h3 class="box-title">Datos Fiscales</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
          @if($catempresas->emp_datfiscales->count()>0)
            <table class="table table-condensed">
              <tbody><tr>
                <th style="width: 10px">#</th>
                <th>Razon Social</th>
                <th>RFC</th>
                <th>Dirección</th>
                <th>Acciones</th>
              </tr>
            @foreach($catempresas->emp_datfiscales as $key=>$datFiscales)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$datFiscales->razonsocial}}
                  {!! ($datFiscales->sucursal==1)? '<button type="button" class="btn bg-navy btn-xs" data-toggle="tooltip" data-placement="top" title="Sucursal"><i class="fa fa-check-square"></i></button>':'' !!}
                </td>
                <td>{{$datFiscales->RFC}}</td>
                <td>{{$datFiscales->calle.' '.$datFiscales->numeroExt}}</td>
                <td>
                  {!! Form::open(['route' => ['empDatfiscales.destroy', $datFiscales->id], 'method' => 'delete', 'id'=>'deldatfiscalesform'.$datFiscales->id]) !!}
                  <div class='btn-group'>
                  @can('empdatfiscales-edit')
                  <a href="/empDatfiscales/{{$datFiscales->id}}/edit" type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </a>
                  @endcan
                  @can('empdatfiscales-delete')
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDeletedatFiscales(".$datFiscales->id.")"]) !!}
                                      {!! Form::hidden('redirect', 'catempresas.show') !!}
                                      {!! Form::hidden('empresa_id', $catempresas->id) !!}
                  @endcan
                </div>
                {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
            <h5> No existen datos fiscales registrados.</h5>
          @endif
            <h1 class="pull-right">
              @can('empdatfiscales-create')
              @if($catempresas->emp_datfiscales->count()<1)
               <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datfiscales">Agregar datos fiscales</button>
              @endif
              @endcan
            </h1>
          </div>
          <!-- /.box-body -->

        </div>

      </div>
      @endcan
    @can('documentos-list')
    <div class="content">
      <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title">Documentos de la Empresa</h3>
            <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            @if($catempresas->catdocumentos->count()>0)
            <table class="table table-condensed">
              <tbody><tr>
                <th style="width: 10px">#</th>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Nota</th>
                <th>Acciones</th>
              </tr>
            @foreach($catempresas->catdocumentos as$key=>$documento)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$documento->cattipodoc->tipo}}</td>
                <td><a href="{!! asset($documento->archivo) !!}" target="_blank"> Documento </a></td>
                <td>{{$documento->nota}}</td>
                <td>
                  {!! Form::open(['route' => ['catdocumentos.destroy', $documento->id], 'method' => 'delete', 'id'=>'deldocumento'.$documento->id]) !!}
                  @can('documentos-edit')
                  <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                  @endcan
                  @can('documentos-delete')
                  <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteDocumento({{$documento->id}})"> <i class="fa fa-remove"></i></button>
                        {!! Form::hidden('redirect', 'catempresas.show') !!}
                        {!! Form::hidden('empresa_id', $catempresas->id) !!}
                  @endcan
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
            <h5>No existen Documentos registrados para esta empresa.</h5>
          @endif
            <h1 class="pull-right">
              @can('documentos-create')
               <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-documento">Agregar Documento</button>
              @endcan
            </h1>
          </div>
          <!-- /.box-body -->

        </div>
      </div>
      @endcan

      @can('catcuentas-list')
      <div class="content">
        <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Cuentas Bancarias</h3>
              <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              @if($catempresas->catcuentas->count()>0)
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>NoCuenta</th>
                  <th>Banco</th>
                  <th>Sucursal</th>
                  <th>Acciones</th>
                </tr>
              @foreach($catempresas->catcuentas as$key=>$cuenta)
                <tr>
                  <td>{{$key+1}}</td>
                  <td><a href="{{url('/catcuentas/'.$cuenta->id)}}">{{$cuenta->numcuenta}}</a></td>
                  <td>{{$cuenta->catBanco->nombre}}</td>
                  <td>{{$cuenta->sucursal}}</td>
                  <td>
                    {!! Form::open(['route' => ['catcuentas.destroy', $cuenta->id], 'method' => 'delete', 'id'=>'delcuenta'.$cuenta->id]) !!}
                    @can('catcuentas-edit')
                    <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                    @endcan
                    @can('catcuentas-delete')
                    <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteCuenta({{$cuenta->id}})"> <i class="fa fa-remove"></i></button>
                        {!! Form::hidden('redirect', 'catempresas.show') !!}
                        {!! Form::hidden('empresa_id', $catempresas->id) !!}
                    @endcan
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <h5>No existen cuentas bancarias registradas.</h5>
            @endif
              <h1 class="pull-right">
                @can('catcuentas-create')
                 <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-cuentabancaria">Agregar Cuenta</button>
                @endcan
              </h1>
            </div>
            <!-- /.box-body -->

          </div>
        </div>
        @endcan

      @can('empdatfiscales-create')
      <div class="modal fade" id="modal-datfiscales">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Datos Fiscales</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'empDatfiscales.store']) !!}
                    <!-- Sucursal Field -->
                    <div class="input-group">
                      <span class="input-group-addon">
                        {!! Form::checkbox('sucursal', null) !!}
                      </span>
                        {!! Form::label('sucursal', 'Sucursal') !!}
                    </div>

                    <!-- Empresa Id Field -->
                        {!! Form::hidden('empresa_id', $catempresas->id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('redirect', 'clientes.show') !!}

                    <!-- Razonsocial Field -->
                    <div class="form-group">
                        {!! Form::label('razonsocial', 'Razon Social:') !!}
                        {!! Form::text('razonsocial', null, ['class' => 'form-control', 'maxlength'=>'120', 'onKeyUp'=>'this.value=this.value.toUpperCase();']) !!}
                    </div>

                    <!-- Rfc Field -->
                    <div class="form-group">
                        {!! Form::label('RFC', 'RFC:') !!}
                        {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13', 'onKeyUp'=>'this.value=this.value.toUpperCase();']) !!}
                    </div>

                    <!-- Calle Field -->
                    <div class="form-group">
                        {!! Form::label('calle', 'Calle:') !!}
                        {!! Form::text('calle', null, ['class' => 'form-control', 'maxlength'=>'191']) !!}
                    </div>

                    <!-- Numeroext Field -->
                    <div class="form-group">
                        {!! Form::label('numeroExt', 'Numero Exterior:') !!}
                        {!! Form::text('numeroExt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                    </div>

                    <!-- Numeroint Field -->
                    <div class="form-group">
                        {!! Form::label('numeroInt', 'Numero Interior:') !!}
                        {!! Form::text('numeroInt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                    </div>

                    <!-- Estado Id Field -->
                    <div class="form-group">
                        {!! Form::label('estado_id', 'Estado Id:') !!}
                        {!! Form::select('estado_id', $estados, null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- Municipio Id Field -->
                    <div class="form-group">
                        {!! Form::label('municipio_id', 'Municipio Id:') !!}
                        {!! Form::select('municipio_id', ['Seleccione uno'], null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- Colonia Field -->
                    <div class="form-group">
                        {!! Form::label('colonia', 'Colonia:') !!}
                        {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Codpostal Field -->
                    <div class="form-group">
                        {!! Form::label('codpostal', 'Código Postal:') !!}
                        {!! Form::number('codpostal', null, ['class' => 'form-control', 'maxlength'=>'6']) !!}
                    </div>

                    <!-- Referencias Field -->
                    <div class="form-group">
                        {!! Form::label('referencias', 'Referencias:') !!}
                        {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Agregar Datos</button>
                </div>
                {!! Form::close() !!}
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        @endcan


        @can('documentos-create')
        <div class="modal fade" id="modal-documento">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agregar Documento</h4>
                  </div>
                  <div class="modal-body">
                      {!! Form::open(['route' => 'catdocumentos.store', 'enctype' => 'multipart/form-data']) !!}

                  {!! Form::hidden('empresa_id', $catempresas->id) !!}
                  {!! Form::hidden('redirect', 'catempresas.show') !!}
                  <div class="form-group">
                      {!! Form::label('tipodoc', 'Tipo de Documento:') !!}
                      {!! Form::select('tipodoc', $tipodocs, null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Archivo Field -->
                  <div class="form-group">
                      {!! Form::label('archivo', 'Archivo:') !!}
                      {!! Form::file('archivo', ['class' => 'form-control'])!!}
                  </div>
                  <div class="clearfix"></div>

                  <!-- Nota Field -->
                  <div class="form-group">
                      {!! Form::label('nota', 'Nota:') !!}
                      {!! Form::text('nota', null, ['class' => 'form-control']) !!}
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="agregardoc">Agregar Documento</button>
                  </div>
                  {!! Form::close() !!}

                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
          @endcan

          @can('catcuentas-create')
          <div class="modal fade" id="modal-cuentabancaria">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Agregar Cuenta Bancaria</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => 'catcuentas.store']) !!}

                    {!! Form::hidden('empresa_id', $catempresas->id) !!}
                    {!! Form::hidden('redirect', 'catempresas.show') !!}

                    <!-- Banco Id Field -->
                    <div class="form-group">
                        {!! Form::label('banco_id', 'Banco:') !!}
                        {!! Form::select('banco_id', $bancos, null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Numcuenta Field -->
                    <div class="form-group">
                        {!! Form::label('numcuenta', 'Número de cuenta:') !!}
                        {!! Form::text('numcuenta', null, ['class' => 'form-control', 'required'=>'true', 'maxlength'=>'10']) !!}
                    </div>

                    <!-- Clabeinterbancaria Field -->
                    <div class="form-group">
                        {!! Form::label('clabeinterbancaria', 'Clabe Interbancaria:') !!}
                        {!! Form::text('clabeinterbancaria', null, ['class' => 'form-control', 'maxlength'=>'18']) !!}
                    </div>

                    <!-- Sucursal Field -->
                    <div class="form-group">
                        {!! Form::label('sucursal', 'Sucursal:') !!}
                        {!! Form::text('sucursal', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                    </div>

                    <!-- Swift Field -->
                    <div class="form-group">
                        {!! Form::label('swift', 'Swift:') !!}
                        {!! Form::text('swift', null, ['class' => 'form-control', 'maxlength'=>'30']) !!}
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" id="agregardoc">Agregar Cuenta</button>
                    </div>
                    {!! Form::close() !!}

                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>
            @endcan


@endsection
@section('scripts')
<script>
  $('#estado_id').on('change', function(e) {
    //console.log(e);
    var estado_id = e.target.value;
    //ajax
    $.get('/GetMunicipios/'+estado_id, function(data) {
      //exito al obtener los datos
      //console.log(data);
      $('#municipio_id').empty();
      $.each(data, function(index, Municipios) {
        $('#municipio_id').append('<option value ="' + Municipios.id + '">'+Municipios.nomMunicipio+'</option>' );
      });
    });
  });
function ConfirmDeletedatFiscales(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminarán estos datos fiscales.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['deldatfiscalesform'+id].submit();
    }
  })
}

function ConfirmDeleteDocumento(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminará el documento seleccionado.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['deldocumento'+id].submit();
    }
  })
}

function ConfirmDeleteCuenta(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminará la cuenta bancaria.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['delcuenta'+id].submit();
    }
  })
}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
  @endsection
