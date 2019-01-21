<table class="table table-bordered table-striped" id="clientes-table">
    <thead>
        <tr>
          <th>Nombre</th>
          <th>RFC</th>
          <th>Giro</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{!! $clientes->nomcompleto !!}</td>
            <td>{!! $clientes->RFC !!}</td>
            <td>{!! $clientes->giro !!}</td>
            <td>
              {!! ($clientes->persfisica == 1) ? '<span class="badge bg-blue"><i class="fa fa-toggle-on"></i> Persona Física</span>' : '<span class="badge bg-primary"><i class="fa fa-toggle-off"></i> Empresa</span>' !!}
            </td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete', 'id'=>'form'.$clientes->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('clientes.show', [$clientes->id]) !!}" class='btn btn-info'><i class="fa fa-eye"></i></a>
                    @can('clientes-edit')
                    <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('clientes-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete(".$clientes->id.")"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
          <th>Nombre</th>
          <th>RFC</th>
          <th>CURP</th>
          <th>Persona Física</th>
          <th>Acciones</th>
        </tr>
    </tfoot>
</table>
@section('scripts')
<!-- DataTables -->
<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#clientes-table').DataTable({
      "language": {
                "url": "{{asset('adminlte/bower_components/datatables.net/Spanish.json')}}"
            }
    })
  })

function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Estás seguro borraras a este cliente.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['form'+id].submit();
  }
})

}
</script>
@endsection
