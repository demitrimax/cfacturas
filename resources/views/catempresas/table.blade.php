<table class="table table-responsive" id="catempresas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Correo Facturación</th>
        <th>Correo Notificaciones</th>
        <th>Teléfono</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catempresas as $catempresas)
        <tr>
            <td>{!! $catempresas->nombre !!}</td>
            <td>{!! $catempresas->correo_factura !!}</td>
            <td>{!! $catempresas->correo_notifica !!}</td>
            <td>{!! $catempresas->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['catempresas.destroy', $catempresas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catempresas.show', [$catempresas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catempresas.edit', [$catempresas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
