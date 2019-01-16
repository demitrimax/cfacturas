<table class="table table-responsive" id="formapagos-table">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formapagos as $formapago)
        <tr>
            <td>{!! $formapago->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['formapagos.destroy', $formapago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('formapagos.show', [$formapago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('formapagos.edit', [$formapago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Seguro de Eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
