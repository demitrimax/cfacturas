<table class="table table-responsive" id="empDatfiscales-table">
    <thead>
        <tr>
        <th>Razonsocial</th>
        <th>RFC</th>
        <th>Calle</th>
        <th>Estado</th>
        <th>Municipio</th>
        <th>Colonia</th>
        <th>Cod. Postal</th>
        <th>Referencias</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empDatfiscales as $empDatfiscales)
        <tr>
            <td>{!! $empDatfiscales->razonsocial !!}</td>
            <td>{!! $empDatfiscales->RFC !!}</td>
            <td>{!! $empDatfiscales->calle.' '.$empDatfiscales->numeroExt.' ' .$empDatfiscales->numeroInt!!}</td>
            <td>{!! $empDatfiscales->catestado->nombre !!}</td>
            <td>{!! $empDatfiscales->catmunicipio->nomMunicipio !!}</td>
            <td>{!! $empDatfiscales->colonia !!}</td>
            <td>{!! $empDatfiscales->codpostal !!}</td>
            <td>{!! $empDatfiscales->referencias !!}</td>
            <td>
                {!! Form::open(['route' => ['empDatfiscales.destroy', $empDatfiscales->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empDatfiscales.show', [$empDatfiscales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('empdatfiscales-edit')
                    <a href="{!! route('empDatfiscales.edit', [$empDatfiscales->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('empdatfiscales-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
