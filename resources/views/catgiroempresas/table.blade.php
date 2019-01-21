<table class="table table-responsive" id="catgiroempresas-table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Codigo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catgiroempresas as $catgiroempresa)
        <tr>
            <td>{!! $catgiroempresa->descripcion !!}</td>
            <td>{!! $catgiroempresa->codigo !!}</td>
            <td>
                {!! Form::open(['route' => ['catgiroempresas.destroy', $catgiroempresa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catgiroempresas.show', [$catgiroempresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catgiroempresas.edit', [$catgiroempresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
