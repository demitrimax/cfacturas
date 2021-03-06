
<div class="row">
  <div class="col-md-6 col-sm-7">
    <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-primary">
            <a href="#" data-toggle="modal" data-target="#modal-logoempresa">
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset($logoempresa)}}" alt="User Avatar" width="40">
            </div>
            </a>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username" id="nombreClient">{!! $catempresas->nombre !!}</h3>
            <h5 class="widget-user-desc">Cliente desde: {!! $catempresas->created_at->format('M. Y') !!}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">RFC <span class="pull-right" id="clientRFC">{!! $catempresas->rfc !!}</span></a></li>
              <li><a href="#">Apoderado Legal <span class="pull-right">{!! $catempresas->apoderadolegal !!}</span></a></li>
              <li><a href="#">Correo Notificaciones <span class="pull-right">{!! $catempresas->correo_notifica !!}</span></a></li>
              <li><a href="#">Correo de Facturas <span class="pull-right">{!! $catempresas->correo_factura !!}</span></a></li>
              <li><a href="#">Teléfono <span class="pull-right">{!! $catempresas->telefono !!}</span></a></li>
              <li><a href="#">Giro <span class="pull-right">{!! $catempresas->giroempresa !!}</span></a></li>
              <li><a href="#">Fecha de Alta <span class="pull-right">{!! $catempresas->created_at->format('d/m/Y h:i:s') !!}</span></a></li>
              <li>
                <a href="{!! route('catempresas.edit', [$catempresas->id]) !!}" class="btn bg-purple margin pull-right">Editar</a>
                <a href="{!! route('catempresas.index') !!}" class="btn bg-green margin pull-right">Regresar</a>
              </li>
            </ul>

          </div>
        </div>
  </div>
  <!-- /.col -->
  <div class="col-md-6 col-sm-5">
  @can('direccion-list')
  @if($catempresas->direcciones)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Dirección</h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-stacked">
          <li><a href="#">Calle y Número: <span class="pull-right">{{$catempresas->direcciones->calle.' '.$catempresas->direcciones->numeroExt.' '.$catempresas->direcciones->numeroInt}}</span></a></li>
          <li><a href="#">Código Postal: <span class="pull-right" >{!! $catempresas->direcciones->codpostal !!}</span></a></li>
          <li><a href="#">Ciudad: <span class="pull-right" >{!! $catempresas->direcciones->ciudad !!}</span></a></li>
          <li><a href="#">Colonia: <span class="pull-right" >{!! $catempresas->direcciones->colonia !!}</span></a></li>
          <li><a href="#">Estado: <span class="pull-right" >{!! $catempresas->direcciones->estados->nombre !!}</span></a></li>
          <li><a href="#">Municipio: <span class="pull-right" >{!! $catempresas->direcciones->municipios->nomMunicipio !!}</span></a></li>
          <li><a href="#">Referencia: <span class="pull-right" >{!! $catempresas->direcciones->referencias !!}</span></a></li>
        </ul>
      </div>
    </div>
  @endif
  @endcan
  </div>
  <!-- /.col -->
</div>

@push('modals')
    @can('empresas-edit')
        <!-- Foto de Perfil -->
    <div class="modal fade" id="modal-logoempresa">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Logo de la Empresa</h4>
              </div>
              <div class="modal-body">
                  {!! Form::open(['url' => 'catempresas/logochange', 'enctype' => 'multipart/form-data']) !!}
              <div>
                  Actualice la foto del cliente.
                  {!! Form::file('avatarimg',['accept'=>'image/*']) !!}
                  {!! Form::hidden('empresa_id', $catempresas->id) !!}
                  <img class="profile-user-img img-responsive img-circle" src="{{asset($logoempresa)}}" alt="User profile picture">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                @can('empresas-edit')
                <button type="submit" class="btn btn-primary" id="actualizafoto">Actualizar Foto</button>
                @endcan
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
      @endcan
  @endpush
