<table class="table table-responsive" id="mbancas-table">
    <thead>
        <tr>
          <th>Cuenta</th>
          <th>Tipo de operacion</th>
          <th>Tipo de movimiento</th>
          <th>Concepto</th>
          <th>Fecha</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mbancas as $mbanca)
        <tr>
            <td>{!! $mbanca->catcuenta->numcuenta.' - '.$mbanca->catcuenta->catBanco->nombre !!}</td>
            <td>{!! $mbanca->toperacion !!}</td>
            <td>{!! $mbanca->cattmovimiento->descripcion !!}</td>
            <td>{!! $mbanca->concepto !!}</td>
            <td>{!! $mbanca->fecha !!}</td>
            <td>
                {!! Form::open(['route' => ['mbancas.destroy', $mbanca->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mbancas.show', [$mbanca->id]) !!}" class='btn btn-default btn'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mbancas.edit', [$mbanca->id]) !!}" class='btn btn-default btn'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
