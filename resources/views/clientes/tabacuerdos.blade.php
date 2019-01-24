@can('accomerciales-list')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Acuerdos Comerciales</h3>
      <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
    </button>
  </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if($clientes->accomerciales->count()>0)
      <table class="table table-condensed">
        <tbody>
          <tr>
            <th style="width: 10px">#</th>
            <th>Fecha</th>
            <th>Socio</th>
            <th>Estatus</th>
            <th>Porcentaje</th>
            <th></th>
            <th>Acciones</th>
          </tr>
      @foreach($clientes->accomerciales as$key=>$acuerdos)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$acuerdos->fechasolicitud->format('d-M-Y')}}</td>
          <td>{{$acuerdos->nomsocio}} </a></td>
          <td>{!! ($acuerdos->autorizado == 1) ? '<span class="badge bg-blue"><i class="fa fa-check"></i></span>' : '<span class="badge bg-red"><i class="fa fa-close"></i></span>' !!}</td>
          <td>{{$acuerdos->ac_principalporc}}% : {{$acuerdos->base}}</td>
          <td></td>
          <td>
            {!! Form::open(['route' => ['accomercials.destroy', $acuerdos->id], 'method' => 'delete', 'id'=>'delAcuerdo'.$acuerdos->id]) !!}
            <button type="button" class="btn btn-info" rel="tooltip" title="Detalles" onclick="OpenModalInfo({{$acuerdos->id}},
              '{{$acuerdos->nomsocio}}',
              '{{$acuerdos->cliente->nomcompleto}}',
              '{{$acuerdos->descripcion}}',
              '{{$acuerdos->informacion}}',
              '{{$acuerdos->created_at->format('d/m/Y')}}',
              '{{$acuerdos->elabuser->name}}',
              '{{$acuerdos->ac_principalporc}}',
              '{{$acuerdos->ac_secundariopor}}',
              '{{$acuerdos->base}}')"> <i class="fa fa-search-plus"></i> </button>
            @can('accomerciales-edit')
            <button type="button" class="btn btn-warning" rel="tooltip" title="Editar" Onclick="IrEditarAcuerdo({{$acuerdos->id}})"> <i class="fa fa-pencil"></i> </button>
            @endcan
            @can('accomerciales-delete')
            <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteAcuerdo({{$acuerdos->id}})"> <i class="fa fa-remove"></i></button>
              {!! Form::hidden('redirect', 'clientes.show') !!}
              {!! Form::hidden('cliente_id', $acuerdos->id) !!}
            @endcan
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No existen Acuerdos Comerciales con el Cliente.</p>
    @endif
      <h1 class="pull-right">
        @can('accomerciales-create')
         <!-- <button type="button" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="">Agregar Acuerdo</button> -->
          <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('accomercials.create') !!}">Alta de Nuevo Acuerdo</a>
        @endcan
      </h1>
    </div>
    <!-- /.box-body -->
  </div>

<!--MODAL INFO DE ACUERDO -->
<div class="modal modal-info fade" id="modal-infoAcuerdo">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Datos del Acuerdo Comercial</h4>
              </div>
              <div class="modal-body">
                <dl class="dl-horizontal">
                  <dt>Socio Comercial:</dt>
                  <dd id="socio">$socio</dd>
                  <dt>Cliente:</dt>
                  <dd id="cliente">$cliente</dd>
                  <dt>Descripción del Acuerdo:</dt>
                  <dd id="descripcion">$descripcion</dd>
                  <dt>Observaciones:</dt>
                  <dd id="observaciones">$observaciones</dd>
                  <dt>Fecha de Solicitud:</dt>
                  <dd id="fechasolicitud">$fechasolicitud</dd>
                  <dt>Elaborado por:</dt>
                  <dd id="elaboradopor">$elaboradopor</dd>
                  <dt>Porcentaje Principal:</dt>
                  <dd id="porcentajeprincipal">$porcentajeprincipal</dd>
                  <dt>Porcentaje Secundario:</dt>
                  <dd id="porcentajesecundario">$porcentajesecundario</dd>
                  <dt>Base de Porcentaje:</dt>
                  <dd id="baseporcentaje">$baseporcentaje</dd>
                </dl>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



  @endcan


  @push('scripts')
  <script>
  function IrEditarAcuerdo(id)
  {
    location.href ="{!!url('/')!!}/accomercials/"+id+"/edit";
  }
  function ConfirmDeleteAcuerdo(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminará el Acuerdo Comercial seleccinado.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['delAcuerdo'+id].submit();
    }
  })
  }
function OpenModalInfo(id,socio,cliente,descripcion,observaciones,fechasolicitud,elaboradopor,porcentajeprincipal,porcentajesecundario,baseporcentaje)
{
    $('#modal-infoAcuerdo').modal('show');
    $('#socio').html(socio);
    $('#cliente').html(cliente);
    $('#descripcion').html(descripcion);
    $('#observaciones').html(observaciones);
    $('#fechasolicitud').html(fechasolicitud);
    $('#elaboradopor').html(elaboradopor);
    $('#porcentajeprincipal').html(porcentajeprincipal+'%');
    $('#porcentajesecundario').html(porcentajesecundario+'%');
    $('#baseporcentaje').html(baseporcentaje);

}


  </script>

  @endpush
