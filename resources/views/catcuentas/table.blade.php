@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
<table class="table table-responsive" id="catcuentas-table">
    <thead>
        <tr>
          <th>Banco</th>
          <th>Número de cuenta</th>
          <th>Cliente</th>
          <th>Empresa</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catcuentas as $catcuentas)
        <tr>
            <td>{!! $catcuentas->catBanco->nombre !!}</td>
            <td>{!! $catcuentas->numcuenta !!}</td>
            <td>{!! $catcuentas->nombrecliente !!}</td>
            <td>{!! $catcuentas->nombreempresa !!}</td>
            <td>
                {!! Form::open(['route' => ['catcuentas.destroy', $catcuentas->id], 'method' => 'delete', 'id'=>'form'.$catcuentas->id]) !!}
                <div class='btn-group'>

                    <a href="{!! route('catcuentas.show', [$catcuentas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('catcuentas-edit')
                    <a href="{!! route('catcuentas.edit', [$catcuentas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('catcuentas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($catcuentas->id)"]) !!}
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
<script src="{{asset('js/catbancos.js')}}"></script>
<script>
function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar la cuenta?.',
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
