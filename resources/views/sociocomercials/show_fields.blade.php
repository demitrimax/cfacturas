<div class="row">
  <div class="col-md-6 col-sm-7">
    <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-navy">
            <a href="#" data-toggle="modal" data-target="#modal-fotoperfil">
            <div class="widget-user-image">
              <img class="img-circle" src="{{asset($avatar)}}" alt="User Avatar" width="40">
            </div>
            </a>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username" id="nombreClient">{!! $sociocomercial->nombre.' '.$sociocomercial->apellidopat.' '.$sociocomercial->apellidomat !!}</h3>
            <h5 class="widget-user-desc">Cliente desde: {!! $sociocomercial->created_at->format('M. Y') !!}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">Feha de Nacimiento <span class="pull-right">{{$fecnac}}</span></a></li>
              <li><a href="#">RFC <span class="pull-right" id="clientRFC">{!! $sociocomercial->RFC !!}</span></a></li>
              <li><a href="#">CURP <span class="pull-right">{!! $sociocomercial->CURP !!}</span></a></li>
              <li><a href="#">Correo Electronico <span class="pull-right">{!! $sociocomercial->correo !!}</span></a></li>
              <li><a href="#">Teléfono <span class="pull-right">{!! $sociocomercial->telefono !!}</span></a></li>
              <li><a href="#">Porcentaje de Comisión: <span class="pull-right">{!! $sociocomercial->comision.'% - '.$sociocomercial->base !!}</span></a></li>
              <li><a href="#">Fecha de Alta <span class="pull-right">{!! $sociocomercial->created_at->format('d/m/Y h:i:s') !!}</span></a></li>
              <li>
                <a href="{!! route('sociocomercials.edit', [$sociocomercial->id]) !!}" class="btn bg-purple margin pull-right">Editar</a>
                <a href="{!! route('sociocomercials.index') !!}" class="btn bg-green margin pull-right">Regresar</a>
              </li>
            </ul>

          </div>
        </div>
  </div>
  <!-- /.col -->
  <div class="col-md-6 col-sm-5">
  @can('direccion-list')
  @isset($sociocomercial->direcciones->id)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Dirección</h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-stacked">
          <li><a href="#">Calle y Número: <span class="pull-right">{{$sociocomercial->direcciones->calle.' '.$sociocomercial->direcciones->numeroExt.' '.$sociocomercial->direcciones->numeroInt}}</span></a></li>
          <li><a href="#">Código Postal: <span class="pull-right" >{!! $sociocomercial->direcciones->codpostal !!}</span></a></li>
          <li><a href="#">Colonia: <span class="pull-right" >{!! $sociocomercial->direcciones->colonia !!}</span></a></li>
          <li><a href="#">Estado: <span class="pull-right" >{!! $sociocomercial->direcciones->estados->nombre !!}</span></a></li>
          <li><a href="#">Municipio: <span class="pull-right" >{!! $sociocomercial->direcciones->municipios->nomMunicipio !!}</span></a></li>
          <li><a href="#">Referencia: <span class="pull-right" >{!! $sociocomercial->direcciones->referencias !!}</span></a></li>
        </ul>
      </div>
    </div>
  @endisset
  @endcan
  </div>
  <!-- /.col -->
</div>

@push('modals')
    @can('sociocomercial-edit')
        <!-- Foto de Perfil -->
    <div class="modal fade" id="modal-fotoperfil">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Foto de Perfil</h4>
              </div>
              <div class="modal-body">
                  {!! Form::open(['url' => 'sociocomercial/avatarchange', 'enctype' => 'multipart/form-data']) !!}
              <div>
                  Actualice la foto del cliente.
                  {!! Form::file('avatarimg',['accept'=>'image/*']) !!}
                  {!! Form::hidden('sociocomercial_id', $sociocomercial->id) !!}
                  <img class="profile-user-img img-responsive img-circle" src="{{asset($avatar)}}" alt="User profile picture">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                @can('sociocomercial-edit')
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
