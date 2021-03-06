@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
<table class="table table-responsive" id="catempresas-table">
    <thead>
        <tr>
          <th>Alias Empresa</th>
          <th>Correo Facturación</th>
          <th>Correo Notificaciones</th>
          <th>Teléfono</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catempresas as $catempresas)
        <tr>
            <td><a href="{!! route('catempresas.show', [$catempresas->id]) !!}">{!! $catempresas->nombre !!}</a></td>
            <td>{!! $catempresas->correo_factura !!}</td>
            <td>{!! $catempresas->correo_notifica !!}</td>
            <td>{!! $catempresas->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['catempresas.destroy', $catempresas->id], 'method' => 'delete', 'id' => 'form'.$catempresas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('catempresas.show', [$catempresas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('empresas-edit')
                    <a href="{!! route('catempresas.edit', [$catempresas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('empresas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($catempresas->id)"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
<!-- DataTables -->
<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#catempresas-table').DataTable({
      "language": {
                "url": "{{asset('adminlte/bower_components/datatables.net/Spanish.json')}}"
            }
    })
  })

function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar la empresa?.',
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
