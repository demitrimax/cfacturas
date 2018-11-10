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
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>
