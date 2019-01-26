<table class="table table-responsive" id="accomercials-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Socio Comercial</th>
        <th>Cliente</th>
        <th>Observaciones</th>
        <th>Autorizado</th>
        <th>Elaborado:</th>
        <th>Empresas:</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accomercials as $accomercial)
        <tr>
            <td width="100">{!! ($accomercial->autorizado) ? $accomercial->numacuerdo : $accomercial->fechasolicitud->format('d-M-Y') !!}</td>
            <td>{!! $accomercial->nomsocio !!}</td>
            <td>{!! $accomercial->nomcliente !!}</td>
            <td>{!! $accomercial->informacion !!}</td>
            <td title="{!! ($accomercial->autorizado ) ? 'AUTORIZADO' : 'PENDIENTE' !!}">
              {!! ($accomercial->autorizado) ? '<span class="badge bg-blue"><i class="fa fa-check"></i></span>' : '<span class="badge bg-red"><i class="fa fa-close"></i></span>' !!}
            </td>
            <td>{!! $accomercial->elabuser->name  !!}</td>
            <td>
              @foreach ($accomercial->empresasfact as $empresas)
              <span class="badge">{!! $empresas->nombre !!}</span>
              @endforeach
            </td>
            <td>
                {!! Form::open(['route' => ['accomercials.destroy', $accomercial->id], 'method' => 'delete', 'id'=>'form'.$accomercial->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('accomercials.show', [$accomercial->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('accomerciales-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmaEliminar($accomercial->id)"]) !!}
                    @endcan
                    @include('accomercials.botonesautoriza')
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
