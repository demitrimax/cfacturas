<div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <th></th>
                    <th></th>
                  </thead>
                  <tbody>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('banco_id', 'Banco:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->catBanco->nombre !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('numcuenta', 'Numcuenta:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->numcuenta !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('clabeinterbancaria', 'Clabeinterbancaria:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->clabeinterbancaria !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('sucursal', 'Sucursal:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->sucursal !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('cliente_id', 'Cliente:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->nombrecliente !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">{!! Form::label('empresa_id', 'Empresa:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->nombreempresa !!}</b></td>
                  </tr>
                  <tr>
                    <td class="mailbox-name">  {!! Form::label('swift', 'Cuenta Swift:') !!}</td>
                    <td class="mailbox-subject"><b>{!! $catcuentas->swift !!}</b></td>
                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
</div>
