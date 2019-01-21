<table class="table table-responsive" id="solicitudes-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Concepto</th>
        <th>Comentario</th>
        <th>Atendido</th>
        <th>Fecha</th>
        <th>Asignado a</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitudes)
        <tr>
            <td title="{!! $solicitudes->correo !!}">{!! $solicitudes->nombre !!}</td>
            <td>
              <a href="{!! route('solfact.show', [$solicitudes->id]) !!}">
                {!! str_limit(strip_tags($solicitudes->concepto),30,'...') !!}
              </a>
              {!! ($solicitudes->adjunto) ? '<i class="fa fa-paperclip"></i>' : '' !!}

            </td>
            <td>{!! $solicitudes->comentario !!}</td>
            <td>{!! $solicitudes->atendido !!}</td>
            <td>{!! $solicitudes->fecha->format('d/m/Y H:i:s') !!}
                <small class="label label-{{$solicitudes->semaforofecha}}"><i class="fa fa-clock-o"></i> {{ $solicitudes->created_at->diffForHumans()}}</small>
            </td>
            <td>{!! $solicitudes->asignado !!}</td>
            <td>
                {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete', 'id'=>'form'.$solicitudes->id]) !!}
                <div class='btn-group'>

                    <a href="{!! route('solfact.show', [$solicitudes->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('solicitud-edit')
                    <a href="{!! route('solfact.edit', [$solicitudes->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('solicitud-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete(".$solicitudes->id.")"]) !!}
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
@can('solicitud-delete')
function ConfirmDelete(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar esta solicitud.',
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
