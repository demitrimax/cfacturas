<!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">{{ $solicitudess->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Usted tiene {{ $solicitudess->count() }} Solicitudes Asignadas</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach($solicitudess as $solic)
                  <li><!-- Task item -->
                    <a href="{{url('solfact/'.$solic->id)}}">
                      <h3>
                        {{ str_limit(strip_tags($solic->concepto),30,'...') }}
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  @endforeach
                </ul>
              </li>
              <li class="footer">
                <a href="#">Ver todas las Solicitudes</a>
              </li>
            </ul>
          </li>
