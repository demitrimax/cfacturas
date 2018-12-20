<table class="table table-responsive" id="pagometodos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pagometodos as $pagometodo)
        <tr>
            <td>{!! $pagometodo->nombre !!}</td>
            <td>{!! $pagometodo->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['pagometodos.destroy', $pagometodo->id], 'method' => 'delete', 'id'=>'form'.$pagometodo->id ]) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagometodos.show', [$pagometodo->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pagometodos.edit', [$pagometodo->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($pagometodo->id)"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
<script>
function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se borrará el método de pago.',
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
