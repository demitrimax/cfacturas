<table class="table table-responsive" id="facturas-table">
    <thead>
        <tr>
            <th>Cliente Id</th>
        <th>Direccion Id</th>
        <th>Empresa Id</th>
        <th>Concepto</th>
        <th>Metodopago Id</th>
        <th>Condicionpago Id</th>
        <th>Complementopago Id</th>
        <th>Fecha</th>
        <th>Estatus Id</th>
        <th>Comprobante</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($facturas as $facturas)
        <tr>
            <td>{!! $facturas->cliente_id !!}</td>
            <td>{!! $facturas->direccion_id !!}</td>
            <td>{!! $facturas->empresa_id !!}</td>
            <td>{!! $facturas->concepto !!}</td>
            <td>{!! $facturas->metodopago_id !!}</td>
            <td>{!! $facturas->condicionpago_id !!}</td>
            <td>{!! $facturas->complementopago_id !!}</td>
            <td>{!! $facturas->fecha !!}</td>
            <td>{!! $facturas->estatus_id !!}</td>
            <td>{!! $facturas->comprobante !!}</td>
            <td>
                {!! Form::open(['route' => ['facturas.destroy', $facturas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('facturas.show', [$facturas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('facturas.edit', [$facturas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>