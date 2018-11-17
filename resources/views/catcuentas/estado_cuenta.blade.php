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
                    <td class="mailbox-subject pull-right"><b>{!! number_format($cargos,2) !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">Abonos:</td>
                    <td class="mailbox-subject pull-right"><b>{!! number_format($abonos,2) !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">Ultimo movimiento:</td>
                    <td class="mailbox-subject pull-right"><b>Fecha Movimiento</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">Saldo en la Cuenta:</td>
                    <td class="mailbox-subject pull-right"><b>{!! number_format($saldo,2) !!}</b></td>
                  </tr>

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
</div>
