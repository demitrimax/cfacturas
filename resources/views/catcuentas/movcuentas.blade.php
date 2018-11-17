@if($mbancarios->count())
<table class="table table-responsive" id="mbancas-table">
    <thead>
        <tr>
          <th>Cuenta</th>
          <th>Tipo de operacion</th>
          <th>Tipo de movimiento</th>
          <th>Concepto</th>
          <th>Fecha</th>
          <th>Monto</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mbancarios as $mbancario)
        <tr>
            <td>{!! $mbancario->catcuenta->numcuenta.' - '.$mbancario->catcuenta->catBanco->nombre !!}</td>
            <td>
               {!! ($mbancario->toperacion == 'cargo')? '<span class="badge bg-red">CARGO</span>' : '<span class="badge bg-blue">ABONO</span>' !!}
            </td>
            <td>{!! $mbancario->cattmovimiento->descripcion !!} </td>
            <td>{!! $mbancario->concepto !!}</td>
            <td>{!! $mbancario->fecha !!}</td>
            <td>{!! number_format($mbancario->monto,2) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $mbancarios->links() }}
@else
  <p> No existen movimientos registrados en esta cuenta </p>
@endif

<button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-addmov">Agregar Movimiento</button>
