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
            <td><a href="{!! route('sociocomercials.show', [$sociocomercial->id]) !!}">{!! $sociocomercial->nomcompleto !!}</a></td>
            <td>{!! $sociocomercial->correo !!}</td>
            <td>{!! $sociocomercial->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['sociocomercials.destroy', $sociocomercial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sociocomercials.show', [$sociocomercial->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('sociocomercial-edit')
                    <a href="{!! route('sociocomercials.edit', [$sociocomercial->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('sociocomercial-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
