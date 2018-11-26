<table class="table table-responsive" id="accomercials-table">
    <thead>
        <tr>
        <th>Fecha</th>
        <th>Socio Comercial</th>
        <th>Cliente</th>
        <th>Informacion</th>
        <th>Autorizado</th>
        <th>Elaborado:</th>
        <th>Visto bueno:</th>
        <th>Autorizado: </th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($accomercials as $accomercial)
        <tr>
            <td>{!! $accomercial->fechasolicitud->format('d-M-Y') !!}</td>
            <td>{!! $accomercial->nomsocio !!}</td>
            <td>{!! $accomercial->cliente->nomcompleto !!}</td>
            <td>{!! $accomercial->informacion !!}</td>
            <td>{!! $accomercial->autorizado !!}</td>
            <td>{!! $accomercial->elabuser->name !!}</td>
            <td>{!! $accomercial->autuser->name !!}</td>
            <td>{!! $accomercial->autuser2->name !!}</td>
            <td>
                {!! Form::open(['route' => ['accomercials.destroy', $accomercial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('accomercials.show', [$accomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('accomerciales-edit')
                    <a href="{!! route('accomercials.edit', [$accomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('accomerciales-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
