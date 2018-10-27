<table class="table table-responsive" id="datcontactos-table">
    <thead>
        <tr>
            <th>Tipo</th>
        <th>Contacto</th>
        <th>Cliente Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($datcontactos as $datcontacto)
        <tr>
            <td>{!! $datcontacto->tipo !!}</td>
            <td>{!! $datcontacto->contacto !!}</td>
            <td>{!! $datcontacto->cliente_id !!}</td>
            <td>
                {!! Form::open(['route' => ['datcontactos.destroy', $datcontacto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('datcontactos.show', [$datcontacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('datcontactos.edit', [$datcontacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>