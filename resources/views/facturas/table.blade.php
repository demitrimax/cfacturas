<table class="table table-responsive" id="facturas-table">
    <thead>
        <tr>
          <th>Cliente</th>
          <th>Empresa</th>
          <th>Acuerdo</th>
          <th>Fecha</th>
          <th>Folio</th>
          <th>Total</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($facturas as $facturas)
        <tr>
            <td>{!! $facturas->cliente->nomcompleto !!}</td>
            <td>{!! $facturas->empresa->nombre !!}</td>
            <td>{!! $facturas->acuerdo->numacuerdo !!}</td>
            <td>{!! $facturas->fecha->format('d-M-Y') !!}</td>
            <td>{!! $facturas->foliofac !!}</td>
            <td>${!! number_format($facturas->total,2) !!}</td>
            <td>
                {!! Form::open(['route' => ['facturas.destroy', $facturas->id], 'method' => 'delete', 'id'=>'form'.$facturas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('facturas.show', [$facturas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('facturas.edit', [$facturas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @can('facturas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'ConfirmDelete('.$facturas->id.');']) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
<script>
@can('facturas-delete')
function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar esta factura.',
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
@endcan
</script>
@endsection
