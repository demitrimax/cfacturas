@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
<table class="table table-bordered table-striped" id="facturas-table">
    <thead>
        <tr>
          <th>No</th>
          <th>Emisor</th>
          <th>Receptor</th>
          <th>Acuerdo</th>
          <th>Fecha</th>
          <th>Folio</th>
          <th>Met. Pago</th>
          <th>Total</th>
          <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($facturas as $key=>$facturas)
        <tr>
            <td>{!! $key+1 !!}</td>
            <td>{!! $facturas->empresa->nombre !!}</td>
            <td>{!! $facturas->cliente->nomcompleto !!}</td>
            <td>{!! $facturas->acuerdo->numacuerdo !!}</td>
            <td>{!! $facturas->fecha->format('d-M-Y') !!}</td>
            <td>{!! $facturas->foliofac !!}</td>
            <td title="{!!$facturas->pagoMetodo->nombre!!}">{!! $facturas->pagoMetodo->clave !!}</td>
            <td>${!! number_format($facturas->total,2) !!}
              @can('registrar-pago')
                @if($facturas->empresa->tienedatosbancarios)
                  @if($facturas->estatus_id == 5)
                  <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Pagada"><i class="fa fa-dollar"></i></button>
                  @else
                  <a href="{{url('facturas/registro/'.$facturas->id.'/pago')}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Registrar Pago"><i class="fa fa-dollar"></i></a>
                  @endif
                @else
                  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="La empresa no tiene cuentas bancarias registradas"><i class="fa fa-dollar"></i></button>
                @endif
              @endcan
            </td>
            <td>
                {!! Form::open(['route' => ['facturas.destroy', $facturas->id], 'method' => 'delete', 'id'=>'form'.$facturas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('facturas.show', [$facturas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('facturas.edit', [$facturas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @can('facturas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'ConfirmDelete('.$facturas->id.');']) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('scripts')
<!-- DataTables -->
<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
    $('#facturas-table').DataTable({
      "language": {
                "url": "{{asset('adminlte/bower_components/datatables.net/Spanish.json')}}"
            }
    })
  })
  </script>
<script>
  @can('facturas-delete')
  function ConfirmDelete(id) {
    swal({
          title: '¿Estás seguro?',
          text: 'Estás seguro de borrar esta factura.',
          type: 'warning',
          showCancelButton: true,
          cancelButtonText: 'Cancelar',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Continuar',
          }).then((result) => {
    if (result.value) {
      document.forms['form'+id].submit();
    }
  })
  }
  @endcan
  </script>
@endpush
