<table class="table table-responsive" id="pagocondicions-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pagocondicions as $pagocondicion)
        <tr>
            <td>{!! $pagocondicion->nombre !!}</td>
            <td>{!! $pagocondicion->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['pagocondicions.destroy', $pagocondicion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagocondicions.show', [$pagocondicion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pagocondicions.edit', [$pagocondicion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>