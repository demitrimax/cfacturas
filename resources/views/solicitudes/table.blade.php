<table class="table table-responsive" id="solicitudes-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Rfc</th>
        <th>Condicion</th>
        <th>Metodo</th>
        <th>Forma</th>
        <th>Concepto</th>
        <th>Comentario</th>
        <th>Adjunto</th>
        <th>Atendido</th>
        <th>Fecha</th>
        <th>Atendidopor</th>
        <th>Facturaid</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($solicitudes as $solicitudes)
        <tr>
            <td>{!! $solicitudes->nombre !!}</td>
            <td>{!! $solicitudes->correo !!}</td>
            <td>{!! $solicitudes->telefono !!}</td>
            <td>{!! $solicitudes->rfc !!}</td>
            <td>{!! $solicitudes->condicion !!}</td>
            <td>{!! $solicitudes->metodo !!}</td>
            <td>{!! $solicitudes->forma !!}</td>
            <td>{!! $solicitudes->concepto !!}</td>
            <td>{!! $solicitudes->comentario !!}</td>
            <td>{!! $solicitudes->adjunto !!}</td>
            <td>{!! $solicitudes->atendido !!}</td>
            <td>{!! $solicitudes->fecha !!}</td>
            <td>{!! $solicitudes->atendidopor !!}</td>
            <td>{!! $solicitudes->facturaid !!}</td>
            <td>
                {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('solfact.show', [$solicitudes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('solfact.edit', [$solicitudes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
