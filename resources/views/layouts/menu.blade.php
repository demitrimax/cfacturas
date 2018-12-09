
        <li class="{{ Request::is('home*') ? 'active' : '' }}">
            <a href="{!! url('/home') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        @can('solicitud-list')
        <li class="{{ Request::is('solicitud*') ? 'active' : '' }}">
            <a href="{!! url('/solicitudes') !!}"><i class="fa fa-check-square-o"></i><span>Solicitudes</span></a>
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
            <i class="fa fa-th"></i> <span>Clientes</span>
          </a>
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
            <i class="fa fa-money"></i> <span>Bancos</span>
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
<?php
$ruta = Request::route()->getName();
//echo $ruta;
?>
@if( $ruta == 'user' || $ruta === 'permissions')
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
            @can('cattmovimientos')
            <li class="{{ Request::is('cattmovimientos*') ? 'active' : '' }}"><a href="{{route('cattmovimientos.index')}}"><i class="fa fa-map-pin"></i> Cat. Movimientos</a></li>
            @endcan

          </ul>
        </li>
@endcan
