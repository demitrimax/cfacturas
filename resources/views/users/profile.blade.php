@extends('layouts.app')

@section('stylesheets')
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
@endsection

@section('body-class')
  skin-blue sidebar-mini
@endsection
@section('body-style')
  height: auto; min-height: 100%;
@endsection
@section('content')
<section class="content-header">
      <h1>
        Perfil
        <small>Datos del usuario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>
<section class="content">
	<div class="row">
        <!-- /.col -->
        <div class="col-md-6 col-md-offset-3">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
              <h5 class="widget-user-desc">Miembro desde: {{ Auth::user()->created_at->format('M. Y') }}</h5>
            </div>
            <a href="#" data-toggle="modal" data-target="#modal-default">
            <div class="widget-user-image">
              @if (empty(Auth::user()->avatar))
                <img src="{{asset('avatar/avatar.png')}}" class="img-circle" alt="User Image"/>
              @else
                   <img src="{{asset('avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image" />
              @endif
            </div></a>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{ Auth::user()->cargo }}</h5>
                    <span class="description-text">CARGO</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{ Auth::user()->nombre.' '.Auth::user()->apellidos }}</h5>
                    <span class="description-text">NOMBRE COMPLETO</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">{{ Auth::user()->rol }}</h5>
                    <span class="description-text">ROL</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <h5 class="description-header">BIO</h5>
                    <span class="description-text">Pequeña biografia del usuario...</span>
                  </div>
                  <!-- /.description-block -->
                </div>

              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

      </div>

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Imagen de Avatar</h4>
              </div>
              <div class="modal-body">
                <form method="post" action="{{url('/avatarchan')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <img src="{{ asset('avatar/'.Auth::user()->avatar)}}" width="400">
                <p>Cambiar la imagen de Avatar</p>
                <input type="file" name="avatarimg" class="form-control" accept="image/*">
                <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    </div>
        <!-- /.modal -->
</section>
@stop
