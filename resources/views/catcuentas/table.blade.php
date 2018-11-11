<table class="table table-responsive" id="catcuentas-table">
    <thead>
        <tr>
        <th>Banco</th>
        <th>Número de cuenta</th>
        <th>Clabe Interbancaria</th>
        <th>Sucursal</th>
        <th>Cliente</th>
        <th>Empresa</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catcuentas as $catcuentas)
        <tr>
            <td>{!! $catcuentas->banco_id !!}</td>
            <td>{!! $catcuentas->numcuenta !!}</td>
            <td>{!! $catcuentas->clabeinterbancaria !!}</td>
            <td>{!! $catcuentas->sucursal !!}</td>
            <td>{!! $catcuentas->cliente_id !!}</td>
            <td>{!! $catcuentas->empresa_id !!}</td>
            <td>
                {!! Form::open(['route' => ['catcuentas.destroy', $catcuentas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catcuentas.show', [$catcuentas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catcuentas.edit', [$catcuentas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
