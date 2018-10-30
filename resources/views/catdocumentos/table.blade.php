<table class="table table-responsive" id="catdocumentos-table">
    <thead>
        <tr>
            <th>Tipodoc</th>
        <th>Archivo</th>
        <th>Nota</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catdocumentos as $catdocumentos)
        <tr>
            <td>{!! $catdocumentos->tipodoc !!}</td>
            <td>{!! $catdocumentos->archivo !!}</td>
            <td>{!! $catdocumentos->nota !!}</td>
            <td>
                {!! Form::open(['route' => ['catdocumentos.destroy', $catdocumentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catdocumentos.show', [$catdocumentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catdocumentos.edit', [$catdocumentos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>