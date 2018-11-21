<table class="table table-responsive" id="cattmovimientos-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Descrp Corto</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cattmovimientos as $cattmovimiento)
        <tr>
            <td>{!! $cattmovimiento->descripcion !!}</td>
            <td>{!! $cattmovimiento->descrp_corto !!}</td>
            <td>
                {!! Form::open(['route' => ['cattmovimientos.destroy', $cattmovimiento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cattmovimientos.show', [$cattmovimiento->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cattmovimientos.edit', [$cattmovimiento->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
