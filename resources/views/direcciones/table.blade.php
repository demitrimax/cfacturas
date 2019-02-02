<table class="table table-responsive" id="direcciones-table">
    <thead>
        <tr>
        <th>Cliente</th>
        <th>RFC</th>
        <th>Razon Social</th>
        <th>Dirección</th>
        <th>Estado Id</th>
        <th>Municipio Id</th>
        <th>Colonia</th>
        <th>Codpostal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($direcciones as $direcciones)
        <tr>
            <td>{!! $direcciones->clientenombre !!}</td>
            <td>{!! $direcciones->rfc !!}</td>
            <td>{!! $direcciones->razonsocial !!}</td>
            <td>{!! $direcciones->calle. ' '. $direcciones->numeroExt!!}</td>
            <td>{!! $direcciones->estados->nombre !!}</td>
            <td>{!! $direcciones->municipios->nomMunicipio !!}</td>
            <td>{!! $direcciones->colonia !!}</td>
            <td>{!! $direcciones->codpostal !!}</td>
            <td>
                {!! Form::open(['route' => ['direcciones.destroy', $direcciones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('direcciones.show', [$direcciones->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('direcciones.edit', [$direcciones->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
