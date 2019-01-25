@can('catcuentas-list')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Cuentas de la Empresa</h3>
      <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
    </button>
  </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if($catempresas->catcuentas->count()>0)
      <table class="table table-condensed">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Número de Cuenta</th>
          <th>Banco</th>
          <th>Sucursal</th>
          <th>Acciones</th>
        </tr>
      @foreach($catempresas->catcuentas as$key=>$cuenta)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$cuenta->numcuenta}}</td>
          <td>{{$cuenta->catBanco->nombre}} </a></td>
          <td>{{$cuenta->sucursal}}</td>
          <td>
            {!! Form::open(['route' => ['catcuentas.destroy', $cuenta->id], 'method' => 'delete', 'id'=>'delCuenta'.$cuenta->id]) !!}
            <button type="button" class="btn btn-info" rel="tooltip" title="Detalles" Onclick="MostrarDetalles({{$cuenta->id}},'{{$cuenta->catBanco->nombre}}','{{$cuenta->numcuenta}}','{{$cuenta->clabeinterbancaria}}','{{$cuenta->sucursal}}')"> <i class="fa fa-exclamation-circle"></i> </button>
            @can('catcuentas-edit')
            <button type="button" class="btn btn-warning" rel="tooltip" title="Editar" Onclick="editarCuenta({{$cuenta->id}})"> <i class="fa fa-pencil"></i> </button>
            @endcan
            @can('catcuentas-delete')
            <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteCuenta({{$cuenta->id}})"> <i class="fa fa-remove"></i></button>
              {!! Form::hidden('redirect', 'clientes.show') !!}
              {!! Form::hidden('empresa_id', $catempresas->id) !!}
            @endcan
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No existen cuentas asociadas al cliente.</p>
    @endif
      <h1 class="pull-right">
        @can('catcuentas-create')
         <button type="button" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-cuenta">Agregar Cuenta</button>
        @endcan
      </h1>
    </div>
    <!-- /.box-body -->
  </div>
  @endcan

<!-- Modal Cuenta Bancaria -->
  <div class="modal fade" id="modal-cuenta">
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
                {!! Form::label('numcuenta', 'Número de cuenta:*') !!}
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

    @push('scripts')
    <script>
    function ConfirmDeleteCuenta(id) {
    swal({
          title: '¿Estás seguro?',
          text: 'Se eliminará la cuenta bancaria seleccinada.',
          type: 'warning',
          showCancelButton: true,
          cancelButtonText: 'Cancelar',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Continuar',
          }).then((result) => {
    if (result.value) {
      document.forms['delCuenta'+id].submit();
      }
    })
    }
    function MostrarDetalles(id,banco,numcuenta,clabeinterbancaria,sucursal) {
      Swal.fire({
          title: 'Detalles de la Cuenta',
          type: 'info',
          html:
          '<dl class="dl-horizontal">'+
            '<dt>Banco</dt>'+
            '<dd>'+banco+'</dd>'+
            '<dt>Número de Cuenta</dt>'+
            '<dd>'+numcuenta+'</dd>'+
            '<dt>Clabe Interbancaria</dt>'+
            '<dd>'+clabeinterbancaria+'</dd>'+
            '<dt>Sucursal</dt>'+
            '<dd>'+sucursal+'</dd>'+
          '</dl>',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Ok!',
          confirmButtonAriaLabel: 'Enterado, ok!',
        })
    }
    function editarCuenta(id)
    {
      location.href ="{!!url('/')!!}/catcuentas/"+id+"/edit";
    }
    </script>
    @endpush
