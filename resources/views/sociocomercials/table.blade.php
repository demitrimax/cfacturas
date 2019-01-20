<table class="table table-responsive" id="sociocomercials-table">
    <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sociocomercials as $sociocomercial)
        <tr>
            <td>{!! $sociocomercial->nombre !!}</td>
            <td>{!! $sociocomercial->correo !!}</td>
            <td>{!! $sociocomercial->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['sociocomercials.destroy', $sociocomercial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sociocomercials.show', [$sociocomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sociocomercials.edit', [$sociocomercial->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
