<div class="box box-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-aqua">
        <a href="#" data-toggle="modal" data-target="#modal-fotoperfil">
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset($avatar)}}" alt="User Avatar" width="40">
        </div>
        </a>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username" id="nombreClient">{!! $clientes->nombre." ".$clientes->apellidopat." ".$clientes->apellidomat !!}</h3>
        <h5 class="widget-user-desc">Cliente desde: {!! $clientes->created_at->format('M. Y') !!}</h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a href="#">Feha de Nacimiento <span class="pull-right">{{$edad}}</span></a></li>
          <li><a href="#">RFC <span class="pull-right" id="clientRFC">{!! $clientes->RFC !!}</span></a></li>
          <li><a href="#">CURP <span class="pull-right">{!! $clientes->CURP !!}</span></a></li>
          <li><a href="#">Correo Electronico <span class="pull-right">{!! $clientes->correo !!}</span></a></li>
          <li><a href="#">Dirección <span class="pull-right">{!! $clientes->direccion !!}</span></a></li>
          <li><a href="#">Teléfono <span class="pull-right">{!! $clientes->telefono !!}</span></a></li>
          <li><a href="#">Fecha de Alta <span class="pull-right">{!! $clientes->created_at->format('d/m/Y h:i:s') !!}</span></a></li>
          <li>
            <a href="{!! route('clientes.edit', [$clientes->id]) !!}" class="btn bg-purple btn-flat margin pull-right">Editar</a>
            <a href="{!! route('clientes.index') !!}" class="btn bg-olive btn-flat margin pull-right">Regresar</a>
          </li>
        </ul>

      </div>
    </div>

    <!-- Foto de Perfil -->
@push('modals')
    @can('clientes-edit')
    <div class="modal fade" id="modal-fotoperfil">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Foto de Perfil</h4>
              </div>
              <div class="modal-body">
                  {!! Form::open(['url' => 'clientes/avatarchange', 'enctype' => 'multipart/form-data']) !!}
              <div>
                  Actualice la foto del cliente.
                  {!! Form::file('avatarimg',['accept'=>'image/*']) !!}
                  {!! Form::hidden('cliente_id', $clientes->id) !!}
                  <img class="profile-user-img img-responsive img-circle" src="{{asset($avatar)}}" alt="User profile picture">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                @can('clientes-edit')
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
