<table class="table table-responsive" id="direcciones-table">
    <thead>
        <tr>
            <th>Cliente Id</th>
        <th>Calle</th>
        <th>Numeroext</th>
        <th>Numeroint</th>
        <th>Estado Id</th>
        <th>Municipio Id</th>
        <th>Colonia</th>
        <th>Codpostal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($direcciones as $direcciones)
        <tr>
            <td>{!! $direcciones->cliente_id !!}</td>
            <td>{!! $direcciones->calle !!}</td>
            <td>{!! $direcciones->numeroExt !!}</td>
            <td>{!! $direcciones->numeroInt !!}</td>
            <td>{!! $direcciones->estado_id !!}</td>
            <td>{!! $direcciones->municipio_id !!}</td>
            <td>{!! $direcciones->colonia !!}</td>
            <td>{!! $direcciones->codpostal !!}</td>
            <td>
                {!! Form::open(['route' => ['direcciones.destroy', $direcciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('direcciones.show', [$direcciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('direcciones.edit', [$direcciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>