@can('clientes-list')
  <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Clientes</h3>
        <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
      </button>
    </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        @if($sociocomercial->acuerdoscom->count()>0)
        <table class="table table-condensed">
          <tbody><tr>
            <th style="width: 10px">#</th>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Nombre Comercial</th>
            <th>Acciones</th>
          </tr>
        @foreach($sociocomercial->acuerdoscom as $key=>$acuerdos)
          <tr>
            <td>{{$key+1}}</td>
            <td><a href="{{url('/clientes/'.$acuerdos->cliente_id)}}">{{$acuerdos->cliente->nombre}}</a></td>
            <td>{{$acuerdos->cliente->RFC}}</td>
            <td>{{$acuerdos->cliente->nomcomercial}}</td>
            <td>
              <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>

              <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteCuenta({{$acuerdos->id}})"> <i class="fa fa-remove"></i></button>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <h5>No existen cuentas bancarias registradas.</h5>
      @endif
        <h1 class="pull-right">

        </h1>
      </div>
      <!-- /.box-body -->

    </div>
  @endcan


@push('scripts')
<script>
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
</script>
@endpush
