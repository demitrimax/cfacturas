        @can('dashboard')
        <li class="{{ Request::is('home*') ? 'active' : '' }}">
            <a href="{!! url('/home') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        @endcan
        @can('facturas-list')
        <li class="{{ Request::is('facturas*') ? 'active' : '' }}">
            <a href="{!! route('facturas.index') !!}"><i class="fa fa-diamond"></i><span>Facturas</span></a>
        </li>
        @endcan
        @can('solicitud-list')
        <li class="{{ Request::is('solfact*') ? 'active' : '' }}">
            <a href="{!! route('solfact.index') !!}"><i class="fa fa-sticky-note-o"></i><span>Solicitudes</span></a>
        </li>
        @endcan
        @can('accomerciales-list')
        <li class="{{ Request::is('accomercials*') ? 'active' : '' }}">
            <a href="{!! route('accomercials.index') !!}"><i class="fa fa-check-square-o"></i><span>Acuerdos Comerciales</span></a>
        </li>
        @endcan
        @can('clientes-list')
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
          <a href="{{url('/clientes')}}">
            <i class="fa fa-users"></i> <span>Clientes</span>
          </a>
        </li>
        @endcan
        @can('sociocomercial-list')
        <li class="{{ Request::is('sociocomercials*') ? 'active' : '' }}">
            <a href="{!! route('sociocomercials.index') !!}"><i class="fa fa-user-plus"></i><span>Socios Comerciales</span></a>
        </li>
        @endcan
        @can('empresas-list')
        <li class="{{ Request::is('catempresas*') ? 'active' : '' }}">
          <a href="{{url('/catempresas')}}">
            <i class="fa fa-building"></i> <span>Empresas Facturadoras</span>
          </a>
        </li>
        @endcan
        @can('catbancos-list')
        <li class="{{ Request::is('catBancos*') ? 'active' : '' }}">
          <a href="{{url('/catBancos')}}">
            <i class="fa fa-bank"></i> <span>Bancos</span>
            <span class="pull-right-container">
              @isset($globalnews->catbancos)
              <small class="label pull-right bg-green">nuevo</small>
              @endisset
            </span>
          </a>
        </li>
        @endcan
        @can('catcuentas-list')
        <li class="{{ Request::is('catcuentas*') ? 'active' : '' }}">
          <a href="{{url('/catcuentas')}}">
            <i class="fa fa-usd"></i> <span>Cuentas</span>
            <span class="pull-right-container">
              @isset($globalnews->catcuentas)
              <small class="label pull-right bg-green">nuevo</small>
              @endisset
            </span>
          </a>
        </li>
        @endcan
@can('Administrar Roles y Permisos')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>
@if( Request::is('user*') || Request::is('permissions*') || Request::is('cattmovimientos*') || Request::is('pagocondicions*') || Request::is('roles*') || Request::is('pagometodo*') || Request::is('facestatuses*') || Request::is('logs*') || Request::is('blog*') || Request::is('formapagos*') )
<li class="treeview active">
@else
<li class="treeview">
@endif
          <a href="#">
            <i class="fa fa-gears"></i> <span>Configuración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('user*') ? 'active' : '' }}"><a href="{{route('user.index')}}"><i class="fa fa-user"></i> Usuarios</a></li>
            <li class="{{ Request::is('permissions*') ? 'active' : '' }}"><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i> Permisos</a></li>
            <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{route('roles.index')}}"><i class="fa fa-group"></i> Roles</a></li>
            <li class="{{ Request::is('routes*') ? 'active' : '' }}"><a href="{{url('routes-explorer')}}"><i class="fa fa-user-secret"></i> Routes Explorer</a></li>
            <li class="{{ Request::is('log-*') ? 'active' : '' }}"><a href="{{url('log-viewer')}}"><i class="fa fa-paw"></i> Log-Viewer</a></li>
            <li class="{{ Request::is('logs*') ? 'active' : '' }}"><a href="{{url('logs')}}"><i class="fa fa-question-circle"></i> Logs del Sistema</a></li>
            <li class="{{ Request::is('blogs*') ? 'active' : '' }}"><a href="{!! route('blogs.index') !!}"><i class="fa fa-edit"></i><span>Blogs</span></a></li>

            @can('cattmovimientos')
            <li class="{{ Request::is('cattmovimientos*') ? 'active' : '' }}"><a href="{{route('cattmovimientos.index')}}"><i class="fa fa-map-pin"></i> Cat. Movimientos</a></li>
            @endcan
            @can('formapagos')
            <li class="{{ Request::is('formapagos*') ? 'active' : '' }}">
                <a href="{!! route('formapagos.index') !!}"><i class="fa fa-credit-card"></i><span>Forma de pagos</span></a>
            </li>
            @endcan
            @can('pagocondicion')
            <li class="{{ Request::is('pagocondicions*') ? 'active' : '' }}">
                <a href="{!! route('pagocondicions.index') !!}"><i class="fa fa-dot-circle-o"></i><span>Condiciones de Pago</span></a>
            </li>
            @endcan
            @can('pagometodo')
            <li class="{{ Request::is('pagometodos*') ? 'active' : '' }}">
                <a href="{!! route('pagometodos.index') !!}"><i class="fa fa-bookmark-o"></i><span>Métodos de pago</span></a>
            </li>
            @endcan
            @can('usocfdi')
            <li class="{{ Request::is('usocfdis*') ? 'active' : '' }}">
                <a href="{!! route('usocfdis.index') !!}"><i class="fa fa-paper-plane-o"></i><span>Uso de CFDI</span></a>
            </li>
            @endcan
            @can('estatusfac')
            <li class="{{ Request::is('facestatuses*') ? 'active' : '' }}">
                <a href="{!! route('facestatuses.index') !!}"><i class="fa fa-glass"></i><span>Estatus de Facturas</span></a>
            </li>
            @endcan

          </ul>
        </li>
@endcan
@can('solicitud')

<li class="{{ Request::is('solfactura*') ? 'active' : '' }}">
    <a href="{!! url('/solfactura') !!}"><i class="fa fa-calendar-check-o"></i><span>Nueva Solcitud de Factura</span></a>
</li>
@endcan
