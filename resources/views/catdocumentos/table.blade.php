@php

function human_filesize($bytes, $decimals = 2) {
  $sz = 'BKMGTP';
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

@endphp
<table class="table table-responsive" id="catdocumentos-table">
    <thead>
        <tr>
            <th>Tipo de Documento</th>
            <th>Archivo</th>
            <th>Nota</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catdocumentos as $catdocumentos)
        <tr>
            <td>{!! $catdocumentos->cattipodoc->tipo !!}</td>
            <td>
              <a href="{!!asset($catdocumentos->archivo)!!}" target="_blank">{!! $catdocumentos->archivo !!}</a>
              @if (file_exists($catdocumentos->archivo) )
              : {{ human_filesize(filesize($catdocumentos->archivo)) }}bytes
              @endif

            </td>
            <td>{!! $catdocumentos->nota !!}</td>
            <td>
                {!! Form::open(['route' => ['catdocumentos.destroy', $catdocumentos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catdocumentos.show', [$catdocumentos->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catdocumentos.edit', [$catdocumentos->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
