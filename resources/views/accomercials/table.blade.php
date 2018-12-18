<table class="table table-responsive" id="accomercials-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Socio Comercial</th>
        <th>Cliente</th>
        <th>Informacion</th>
        <th>Autorizado</th>
        <th>Elaborado:</th>
        <th>Visto bueno:</th>
        <th>Autorizado: </th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accomercials as $accomercial)
        <tr>
            <td>{!! $accomercial->fechasolicitud->format('d-M-Y') !!}</td>
            <td>{!! $accomercial->nomsocio !!}</td>
            <td>{!! $accomercial->nomcliente !!}</td>
            <td>{!! $accomercial->informacion !!}</td>
            <td>
              {!! ($accomercial->autorizado == 1) ? '<span class="badge bg-blue"><i class="fa fa-check"></i></span>' : '<span class="badge bg-red"><i class="fa fa-close"></i></span>' !!}
            </td>
            <td>{!! $accomercial->elabuser->name !!}</td>
            <td>{!! $accomercial->autuser->name !!}</td>
            <td>{!! $accomercial->autuser2->name !!}</td>
            <td>
                {!! Form::open(['route' => ['accomercials.destroy', $accomercial->id], 'method' => 'delete', 'id'=>'form'.$accomercial->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('accomercials.show', [$accomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('accomerciales-edit')
                    <a href="{!! route('accomercials.edit', [$accomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('accomerciales-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmaEliminar($accomercial->id)"]) !!}
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
function ConfirmaEliminar(id) {
swal({
      title: '¿Estás seguro de eliminar?',
      text: 'Se eliminará los datos de la solicitud.',
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
