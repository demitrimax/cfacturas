@php

function human_filesized($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

@endphp
@can('documentos-list')
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Cumplimientos y Obligaciones</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
          </div>
          <!-- /.box-header -->
              <div class="box-body">
      @if($clientes->catdocumentos->whereIn('tipodoc',[11,12])->count()>0)
      <table class="table table-condensed">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Tipo de Documento</th>
          <th>Fecha</th>
          <th>Documento</th>
          <th>Nota</th>
          <th>Acciones</th>
        </tr>
      @foreach($clientes->catdocumentos->whereIn('tipodoc',[11,12]) as$key=>$documento)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$documento->cattipodoc->tipo}}</td>
          <td>{{ strftime("%B, %Y", strtotime($documento->fecha))  }}</td>
          <td>
            <a href="{!! asset($documento->archivo) !!}" target="_blank"> Documento </a>
            @if(file_exists($documento->archivo))
              : {{ human_filesized(filesize($documento->archivo)) }} bytes.
            @endif
          </td>
          <td>{{$documento->nota}}</td>
          <td>
            {!! Form::open(['route' => ['catdocumentos.destroy', $documento->id], 'method' => 'delete', 'id'=>'delDocumento'.$documento->id]) !!}
            @can('documentos-delete')
            <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteDocumento({{$documento->id}})"> <i class="fa fa-remove"></i></button>
              {!! Form::hidden('redirect', 'clientes.show') !!}
              {!! Form::hidden('cliente_id', $clientes->id) !!}
              @endcan
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No existen documentos del cliente.</p>
    @endif
      <h1 class="pull-right">
        @can('documentos-create')
         <button type="button" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-cumplimiento">Alta de Doc de Cumplimiento y Obligaciones</button>
        @endcan
      </h1>
    <!-- /.box-body -->
  </div>
  </div>
  @endcan


<!--modal -->
@push('modals')
<div class="modal fade" id="modal-cumplimiento">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Alta de Documento de Cumplimientos y Obligaciones</h4>
          </div>
          <div class="modal-body">
              {!! Form::open(['route' => 'catdocumentos.store', 'enctype' => 'multipart/form-data']) !!}

          {!! Form::hidden('cliente_id', $clientes->id) !!}
          {!! Form::hidden('redirect', 'clientes.show') !!}
          <div class="form-group">
              {!! Form::label('tipodoc', 'Tipo de Documento:') !!}
              {!! Form::select('tipodoc', $tipodocsd, null, ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('fecha', 'Mes y Año:') !!}
              {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
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
  @endpush

  @push('scripts')
  <script>
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
    document.forms['delDocumento'+id].submit();
    }
  })
  }
  </script>
  @endpush
