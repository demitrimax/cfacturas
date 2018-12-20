<table class="table table-responsive" id="pagometodos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pagometodos as $pagometodo)
        <tr>
            <td>{!! $pagometodo->nombre !!}</td>
            <td>{!! $pagometodo->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['pagometodos.destroy', $pagometodo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagometodos.show', [$pagometodo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pagometodos.edit', [$pagometodo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
