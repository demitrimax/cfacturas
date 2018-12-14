<table class="table table-responsive" id="solicitudes-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Concepto</th>
        <th>Comentario</th>
        <th>Adjunto</th>
        <th>Atendido</th>
        <th>Fecha</th>
        <th>Atendido Por</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitudes)
        <tr>
            <td>{!! $solicitudes->nombre !!}</td>
            <td>{!! $solicitudes->correo !!}</td>
            <td>{!! $solicitudes->telefono !!}</td>
            <td>
              <a href="{!! route('solfact.show', [$solicitudes->id]) !!}">
                {!! strip_tags($solicitudes->concepto) !!}
              </a>
            </td>
            <td>{!! $solicitudes->comentario !!}</td>
            <td>
              {!! ($solicitudes->adjunto) ? '<i class="fa fa-paperclip"></i>' : '' !!}
            </td>
            <td>{!! $solicitudes->atendido !!}</td>
            <td>{!! $solicitudes->fecha !!}</td>
            <td>{!! $solicitudes->atendidopor !!}</td>
            <td>
                {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('solfact.show', [$solicitudes->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('solfact.edit', [$solicitudes->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Esta seguro de eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
