<table class="table table-responsive" id="solicitudes-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Concepto</th>
        <th>Comentario</th>
        <th>Adjunto</th>
        <th>Atendido</th>
        <th>Fecha</th>
        <th>Asignado a</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitudes)
        <tr>
            <td>{!! $solicitudes->nombre !!}</td>
            <td>{!! $solicitudes->correo !!}</td>
            <td>
              <a href="{!! route('solfact.show', [$solicitudes->id]) !!}">
                {!! str_limit(strip_tags($solicitudes->concepto),30,'...') !!}
              </a>
                <small class="label label-{{$solicitudes->semaforofecha}}"><i class="fa fa-clock-o"></i> {{ $solicitudes->created_at->diffForHumans()}}</small>
            </td>
            <td>{!! $solicitudes->comentario !!}</td>
            <td>
              {!! ($solicitudes->adjunto) ? '<i class="fa fa-paperclip"></i>' : '' !!}
            </td>
            <td>{!! $solicitudes->atendido !!}</td>
            <td>{!! $solicitudes->fecha->format('d/m/Y H:i:s') !!}</td>
            <td>{!! $solicitudes->atendidopor !!}</td>
            <td>
                {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete', 'id'=>'form'.$solicitudes->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('solfact.show', [$solicitudes->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('solfact.edit', [$solicitudes->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete(".$solicitudes->id.")"]) !!}
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
</script>
@endsection
