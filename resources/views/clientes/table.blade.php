<table class="table table-responsive" id="clientes-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Apellidopat</th>
        <th>Apellidomat</th>
        <th>Rfc</th>
        <th>Curp</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clientes)
        <tr>
            <td>{!! $clientes->nombre !!}</td>
            <td>{!! $clientes->apellidopat !!}</td>
            <td>{!! $clientes->apellidomat !!}</td>
            <td>{!! $clientes->RFC !!}</td>
            <td>{!! $clientes->CURP !!}</td>
            <td>
                {!! Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('clientes.show', [$clientes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>