        <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
          <a href="{{url('/clientes')}}">
            <i class="fa fa-th"></i> <span>Clientes</span>
          </a>
        </li>
        <li class="{{ Request::is('catempresas*') ? 'active' : '' }}">
          <a href="{{url('/catempresas')}}">
            <i class="fa fa-building"></i> <span>Empresas</span>
          </a>
        </li>
        <li class="{{ Request::is('catBancos*') ? 'active' : '' }}">
          <a href="{{url('/catBancos')}}">
            <i class="fa fa-money"></i> <span>Bancos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">nuevo</small>
            </span>
          </a>
        </li>
        <li class="{{ Request::is('catcuentas*') ? 'active' : '' }}">
          <a href="{{url('/catcuentas')}}">
            <i class="fa fa-usd"></i> <span>Cuentas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">nuevo</small>
            </span>
          </a>
        </li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="treeview {{ Request::is('user/*') ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user"></i> <span>Control de Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('user/*') ? 'active' : '' }}"><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Permisos</a></li>
            <li class="{{ Request::is('roles/*') ? 'active' : '' }}"><a href="{{route('roles.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
          </ul>
        </li>
