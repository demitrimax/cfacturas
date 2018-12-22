@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Solicitudes</h1>
        <h1 class="pull-right">
          @can('solicitud-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('solfact.create') !!}">Agregar Nueva Solicitud</a>
          @endcan

          @can('solicitud-undelete')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('solfact/deleted/lista') !!}">Solicitudes Eliminadas</a>
          <button type="button" class="btn btn-default" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-primary"><i class="fa fa-share"></i> Restaurar Solicitud</button>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('solicitudes.table')
                    {{$solicitudes->links()}}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
    <div class="modal modal-primary fade" id="modal-primary">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Restaurar Solicitud</h4>
                </div>
                {!! Form::open(['url'=>'solfact/restaura','id'=>'formRestaura']) !!}
                <div class="modal-body">
                  <p>Escriba el Id de la Solicitud para restaurar.&hellip;</p>
                  {!! Form::number('solicitudid', null, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-outline">Restaurar Solicitud</button>
                    {!! Form::close() !!}
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
@endsection
