<table class="table table-bordered table-striped" id="clientes-table">
    <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>RFC</th>
          <th>CURP</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{!! $clientes->nombre !!}</td>
            <td>{!! $clientes->apellidopat !!}</td>
            <td>{!! $clientes->apellidomat !!}</td>
            <td>{!! $clientes->RFC !!}</td>
            <td>{!! $clientes->CURP !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete', 'id'=>'form'.$clientes->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('clientes.show', [$clientes->id]) !!}" class='btn btn-info'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete(".$clientes->id.")"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>RFC</th>
          <th>CURP</th>
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
