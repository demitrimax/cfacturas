<table class="table table-responsive" id="usocfdis-table">
    <thead>
        <tr>
          <th>No.</th>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usocfdis as $key=>$usocfdi)
        <tr>
            <td>{!! $usocfdi->id !!}</td>
            <td>{!! $usocfdi->codigo !!}</td>
            <td>{!! $usocfdi->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['usocfdis.destroy', $usocfdi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usocfdis.show', [$usocfdi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usocfdis.edit', [$usocfdi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$usocfdis->links()}}
