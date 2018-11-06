<table class="table table-responsive" id="empDatfiscales-table">
    <thead>
        <tr>
            <th>Empresa Id</th>
        <th>Razonsocial</th>
        <th>Rfc</th>
        <th>Calle</th>
        <th>Numeroext</th>
        <th>Numeroint</th>
        <th>Estado Id</th>
        <th>Municipio Id</th>
        <th>Colonia</th>
        <th>Codpostal</th>
        <th>Referencias</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empDatfiscales as $empDatfiscales)
        <tr>
            <td>{!! $empDatfiscales->empresa_id !!}</td>
            <td>{!! $empDatfiscales->razonsocial !!}</td>
            <td>{!! $empDatfiscales->RFC !!}</td>
            <td>{!! $empDatfiscales->calle !!}</td>
            <td>{!! $empDatfiscales->numeroExt !!}</td>
            <td>{!! $empDatfiscales->numeroInt !!}</td>
            <td>{!! $empDatfiscales->estado_id !!}</td>
            <td>{!! $empDatfiscales->municipio_id !!}</td>
            <td>{!! $empDatfiscales->colonia !!}</td>
            <td>{!! $empDatfiscales->codpostal !!}</td>
            <td>{!! $empDatfiscales->referencias !!}</td>
            <td>
                {!! Form::open(['route' => ['empDatfiscales.destroy', $empDatfiscales->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empDatfiscales.show', [$empDatfiscales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empDatfiscales.edit', [$empDatfiscales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>