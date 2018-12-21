<table class="table table-responsive" id="facestatuses-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($facestatuses as $facestatus)
        <tr>
            <td>{!! $facestatus->nombre !!}</td>
            <td>{!! $facestatus->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['facestatuses.destroy', $facestatus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('facestatuses.show', [$facestatus->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('facestatuses.edit', [$facestatus->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
