@extends('layouts.app')
@section('title',config('app.name').' | Vista de Solicitud' )
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
                <li><a href="mailbox.html"><i class="fa fa-clock-o"></i> Creada hace:
                  <span class="label label-{{$solicitudes->semaforofecha}} pull-right">{{$solicitudes->created_at->diffForHumans()}}</span></a></li>
                <li><a href="#"><i class="fa fa-hand-o-right"></i> Asignada a:</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Estado</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$solicitudes->nombre}}</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>{{$solicitudes->descripcion}}</h3>
                <h5>De: {{$solicitudes->correo}}
                  <span class="mailbox-read-time pull-right">{{$solicitudes->fecha}}</span></h5>
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
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Asignar</button>
              </div>
              <button type="button" class="btn btn-default" Onclick="ConfirmaEliminar()"><i class="fa fa-trash-o"></i> Eliminar</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
  </div>
  {!! Form::open(['route' => ['solfact.destroy', $solicitudes->id], 'method' => 'delete', 'id'=>'formElimina']) !!}
  {!! Form::close() !!}
@endsection
@section('scripts')
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
</script>
@endsection
