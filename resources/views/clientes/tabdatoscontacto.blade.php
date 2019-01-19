@can('contacto-list')
<div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Datos de Contacto</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if($clientes->datcontacto->count()>0)
      <table class="table table-condensed">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Tipo</th>
          <th>Contacto</th>
          <th>Acciones</th>
        </tr>
      @foreach($clientes->datcontacto as$key=>$datcontacto)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$datcontacto->tipo}}</td>
          <td>{{$datcontacto->contacto}}</td>
          <td>
            {!! Form::open(['route' => ['datcontactos.destroy', $datcontacto->id], 'method' => 'delete', 'id'=>'contactform'.$datcontacto->id]) !!}
            <div class='btn-group'>
            @can('contacto-edit')
            <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
            @endcan
            @can('contacto-delete')
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDeleteContacto(".$datcontacto->id.")"]) !!}
                                {!! Form::hidden('redirect', 'clientes.show') !!}
                                {!! Form::hidden('cliente_id', $clientes->id) !!}
            @endcan
          </div>
          {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No existen datos de contacto.</p>
    @endif
      <h1 class="pull-right">
        @can('contacto-create')
         <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datcontacto">Agregar dato de contacto</button>
        @endcan
      </h1>
    </div>
    <!-- /.box-body -->

  </div>
  @endcan

  <div class="modal fade" id="modal-datcontacto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Datos de Contacto</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'datcontactos.store']) !!}
              <div class="form-group col-sm-6">
                  {!! Form::label('tipo', 'Tipo:') !!}
                  {!! Form::select('tipo', ['telefono' => 'telefono', 'email' => 'email', 'whatsapp' => 'whatsapp'], null, ['class' => 'form-control']) !!}
              <!-- Contacto Field -->
            </div>
              <div class="form-group col-sm-6">
                  {!! Form::label('contacto', 'Contacto:') !!}
                  {!! Form::text('contacto', null, ['class' => 'form-control', 'required']) !!}
              </div>
                  {!! Form::hidden('cliente_id', $clientes->id) !!}
                  {!! Form::hidden('redirect', 'clientes.show') !!}

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
