<table class="table table-responsive" id="blogs-table">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Copete</th>
        <th>Usuario</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{!! $blog->titulo !!}</td>
            <td>{!! $blog->copete !!}</td>
            <td>{!! $blog->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['blogs.destroy', $blog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('blogs.show', [$blog->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('blogs.edit', [$blog->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Esta seguro de eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
