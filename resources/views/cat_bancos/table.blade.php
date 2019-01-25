<table class="table table-responsive" id="catBancos-table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Denominacion Social</th>
        <th>Nombre Corto</th>
        <th>RFC</th>
        <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catBancos as $catBancos)
        <tr>
            <td>{!! $catBancos->nombre !!}</td>
            <td>{!! $catBancos->denominacionsocial !!}</td>
            <td>{!! $catBancos->nombrecorto !!}</td>
            <td>{!! $catBancos->RFC !!}</td>
            <td>
                {!! Form::open(['route' => ['catBancos.destroy', $catBancos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catBancos.show', [$catBancos->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('catbancos-edit')
                    <a href="{!! route('catBancos.edit', [$catBancos->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('catbancos-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Esta usted seguro?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
