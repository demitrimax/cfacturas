@extends('layouts.app')
@section('title',config('app.name').' | Vista de Solicitud' )
@section('css')
<!-- Select2 -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
<section class="content-header">
  <h1>
    Vista de Solicitud de Factura
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> dashboard</a></li>
    <li class="active">Solcitud de Factura</li>
  </ol>
</section>

<section class="content">
<div class="row">
<div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Responder Solicitud</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Estatus Solicitud</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-clock-o"></i> Creada hace:
                  <span class="label label-{{$solicitudes->semaforofecha}} pull-right">{{$solicitudes->created_at->diffForHumans()}}</span></a></li>
                <li><a href="#"><i class="fa fa-hand-o-right"></i> Asignada a: <span class="label label-primary pull-right">{{$solicitudes->asignado}}</span></a></a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Estado</a></li>
                <li><a href="#"><i class="fa fa-check-circle-o"></i> Atendidas </a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Eliminadas <span class="label label-warning pull-right">{{$borrados}}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <!-- Sí ya tiene asignado usuario -->
          @if ($solicitudes->atendidopor)
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">{{$solicitudes->asignado }}</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Asignadas <span class="label label-warning pull-right">{{$asignadas}}</span></a></li>
                <li><a href="#"><i class="fa fa-check-circle-o text-yellow"></i> Atendidas <span class="label label-warning pull-right">{{$atendidas}}</span></a></li>
                <li><a href="#"><i class="fa fa-trash-o text-light-blue"></i> Eliminadas <span class="label label-warning pull-right">{{$borradas}}</span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          @endif
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$solicitudes->nombre}}</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Anterior"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Siguiente"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$solicitudes->descripcion}}</h3>
                <h5><b>De:</b> {{$solicitudes->correo}} | Teléfono: {{$solicitudes->telefono}}
                  <span class="mailbox-read-time pull-right">{{$solicitudes->fecha}}</span></h5>


                  <h5></h5>

              </div>
              <div class="mailbox-read-info">
                  <h5><b>Uso de CFDI:</b> {{$solicitudes->usodecfdi->codigo.' '.$solicitudes->usodecfdi->descripcion }}</h5>
              </div>
              <div class="mailbox-read-info">
                  <h5><b>Método de Pago:</b> {{$solicitudes->pagometodo->nombre }}</h5>
              </div>
              <div class="mailbox-read-info">
                  <h5><b>Forma de Pago:</b> {{$solicitudes->formadepago->descripcion }}</h5>
              </div>

              <div class="mailbox-read-message">
                {!! $solicitudes->concepto !!}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              @if ($solicitudes->adjunto)
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="{{ asset($solicitudes->adjunto) }}" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{$solicitudes->adjunto}}</a>
                        <span class="mailbox-attachment-size">
                          {{ $tamanoadjunto }}
                          <a href="{{ asset($solicitudes->adjunto) }}" target="_blank" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
              @endif
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <a href="{{url('/solfact')}}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> Regresar </a>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-primary"><i class="fa fa-street-view"></i> Asignar</button>

              </div>
              @can('solicitud-delete')
              <button type="button" class="btn btn-default" Onclick="ConfirmaEliminar()"><i class="fa fa-trash-o"></i> Eliminar</button>
              @endcan
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        @if($solicitudes->detsolicitud->count()>0)
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detalles de la Solicitud InterEmpresa</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$solicitudes->empresafacturadora}}</h3>
                @if(!($solicitudes->empresafacturadora == "N/D"))
                <h4> {{$solicitudes->empfacturadora->rfc}} </h4>
                <h4> {{$solicitudes->empfacturadora->empdireccion}} </h4>
                @endif

              <div class="mailbox-read-message">
                <table class="table tablaconceptos" id="conceptos">
                  <thead>
                    <tr>
                      <th style="width:4%">Cantidad</th>
                      <th style="width:10%">U.Medida</th>
                      <th style="width:10%;">Unidad</th>
                      <th style="width:20%;">Clave Prod.</th>
                      <th style="width:30%;">Descripcion</th>
                      <th style="width:13%;">P. Unitario</th>
                      <th style="width:13%;">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($solicitudes->detsolicitud as $detallesol)
                    <tr>
                    <td>
                      {{$detallesol->cantidad}}
                    </td>
                    <td>
                      {{$detallesol->umedida}}
                    </td>
                    <td>
                      {{$detallesol->unidad}}
                    </td>
                    <td>
                        {{$detallesol->prodserv_id}}
                    </td>
                    <td>
                        {{$detallesol->descripcion}}
                    </td>
                    <td>
                        $ {{number_format($detallesol->punitario,2)}}
                    </td>
                    <td>
                        ${{ number_format($detallesol->monto,2)}}
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                <div class="row">
                  <div class="col-xs-4 pull-right">
                       <table class="table">

                         <tbody>
                           <tr>
                             <td style="width: 50%" class="pull-right">
                              <b>SUBTOTAL:</b>
                             </td>
                              <td style="width: 50%">
                                <p class="pull-right">${{number_format($solicitudes->subtotal,2)}}</p>
                             </td>
                           </tr>
                           <tr>
                             <td style="width: 50%" class="pull-right">
                               <b>IVA:</b>
                             </td>
                             <td>
                                <p class="pull-right">${{ number_format($solicitudes->iva,2) }}</p>
                             </td>
                           </tr>
                           <tr>
                             <td style="width: 50%" class="pull-right">
                               <b>TOTAL</b>
                             </td>
                             <td style="width: 50%">
                              <p class="pull-right">${{ number_format($solicitudes->total,2) }}</p>
                             </td>
                           </tr>
                         </tbody>
                       </table>
                     </div>
                   </div>

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <a href="{{url('/solfact')}}" type="button" class="btn btn-default"><i class="fa fa-reply"></i> Regresar </a>

              </div>

              <button onclick="location.href='{{url('solfact/InterEmpresa/print/'.$solicitudes->id)}}';" type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
    </div>
    @endif
  </section>

  <div class="modal modal-primary fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar Usuario</h4>
              </div>
              {!! Form::open(['url'=>'solfact/asignar','id'=>'formAsigna']) !!}
              <div class="modal-body">
                <p>Seleccione el Empleado para asignarle esta solicitud.&hellip;</p>
                {!! Form::select('usuario', $empleados, null, ['class' => 'form-control select2', 'style'=> 'width: 100%;']) !!}
                {!! Form::hidden('solicitudid', $solicitudes->id) !!}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Asignar Usuario</button>
                  {!! Form::close() !!}
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete', 'id'=>'formElimina']) !!}
  {!! Form::close() !!}
@endsection
@section('scripts')
<!-- Select2 -->
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
function ConfirmaEliminar() {
swal({
      title: '¿Estás seguro de eliminar?',
      text: 'Se eliminará la solicitud, Se enviará una notificación a los involucrados sobre esta eliminación.',
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Continuar',
      }).then((result) => {
if (result.value) {
      document.forms['formElimina'].submit();
  }
})
}

  $(document).ready(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
});
</script>
@endsection
