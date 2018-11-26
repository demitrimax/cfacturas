<table class="table table-responsive" id="accomercials-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Socio Comercial</th>
        <th>Cliente</th>
        <th>Informacion</th>
        <th>Autorizado</th>
        <th>Elaborado por:</th>
        <th>Autorizado por:</th>
        <th>Aut User2 Id</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accomercials as $accomercial)
        <tr>
            <td>{!! $accomercial->fechasolicitud !!}</td>
            <td>{!! $accomercial->sociocomer_id !!}</td>
            <td>{!! $accomercial->cliente_id !!}</td>
            <td>{!! $accomercial->informacion !!}</td>
            <td>{!! $accomercial->autorizado !!}</td>
            <td>{!! $accomercial->elab_user_id !!}</td>
            <td>{!! $accomercial->aut_user_id !!}</td>
            <td>{!! $accomercial->aut_user2_id !!}</td>
            <td>
                {!! Form::open(['route' => ['accomercials.destroy', $accomercial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accomercials.show', [$accomercial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('accomeriales-edit')
                    <a href="{!! route('accomercials.edit', [$accomercial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('accomerciales-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
