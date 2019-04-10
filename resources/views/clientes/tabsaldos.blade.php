<div class="row">
  <div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Movimientos del Cliente</h3>
  </div>
  <div class="panel-body">
    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Saldos del Cliente</h3>
          <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          @if($clientes->saldos->count()>0)
          <table class="table table-condensed">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Fecha</th>
              <th>Tipo</th>
              <th>Operacion</th>
              <th>Monto</th>
            </tr>
          @foreach($clientes->saldos as $key=>$saldo)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$saldo->fecha->format('d-m-Y') }}</td>
              <td> {!! ($saldo->toperacion == 'cargo')? '<span class="badge bg-red">CARGO</span>' : '<span class="badge bg-blue">ABONO</span>' !!}
              </td>
              <td>{!!$saldo->cattmovimiento->descripcion  !!}</td>
              <td>{{ number_format($saldo->monto,2) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <p>Sin Saldos pendientes.</p>
        @endif
        </div>
        <!-- /.box-body -->
      </div>
  </div>
</div>
</div>
<div class="col-md-6">
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Resumen de Movimiento</h3>
  </div>
  <div class="panel-body">
    <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <thead>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                      <tr>
                        <td class="mailbox-name">Cargos:</td>
                        <td class="mailbox-subject pull-right"><b> {{ number_format($clientes->saldos->where('toperacion','cargo')->sum('monto'),2)}} </b></td>
                      </tr>
                      <tr>
                        <td class="mailbox-name">Abonos:</td>
                        <td class="mailbox-subject pull-right"><b>{{ number_format($clientes->saldos->where('toperacion','abono')->sum('monto'),2)}} </b></td>
                      </tr>
                      <tr>
                        <td class="mailbox-name">Saldo en la Cuenta:</td>
                        <td class="mailbox-subject pull-right"><b>{{number_format($clientes->saldos->where('toperacion','abono')->sum('monto') - $clientes->saldos->where('toperacion','cargo')->sum('monto'),2)}}</b></td>
                      </tr>

                      </tbody>
                    </table>
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
    </div>
  </div>
</div>

</div>
</div>
