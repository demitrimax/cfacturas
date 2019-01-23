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
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Fecha</th>
          <th>Socio</th>
          <th>Estatus</th>
          <th>Acciones</th>
        </tr>
      @foreach($clientes->accomerciales as$key=>$acuerdos)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$acuerdos->fechasolicitud->format('d-M-Y')}}</td>
          <td>{{$acuerdos->nomsocio}} </a></td>
          <td>{!! ($acuerdos->autorizado == 1) ? '<span class="badge bg-blue"><i class="fa fa-check"></i></span>' : '<span class="badge bg-red"><i class="fa fa-close"></i></span>' !!}</td>
          <td>
            {!! Form::open(['route' => ['accomercials.destroy', $acuerdos->id], 'method' => 'delete', 'id'=>'delCuenta'.$acuerdos->id]) !!}
            @can('accomerciales-edit')
            <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
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
         <button type="button" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-acuerdo">Agregar Acuerdo</button>
        @endcan
      </h1>
    </div>
    <!-- /.box-body -->
  </div>
  @endcan
