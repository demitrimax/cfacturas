<table class="table table-responsive" id="catBancos-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Denominacion Social</th>
        <th>Nombre Corto</th>
        <th>RFC</th>
        <th>Entidad</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catBancos as $catBancos)
        <tr>
            <td>{!! $catBancos->nombre !!}</td>
            <td>{!! $catBancos->denominacionsocial !!}</td>
            <td>{!! $catBancos->nombrecorto !!}</td>
            <td>{!! $catBancos->RFC !!}</td>
            <td>{!! $catBancos->Entidad !!}</td>
            <td>{!! $catBancos->email !!}</td>
            <td>
                {!! Form::open(['route' => ['catBancos.destroy', $catBancos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catBancos.show', [$catBancos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catBancos.edit', [$catBancos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta usted seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
