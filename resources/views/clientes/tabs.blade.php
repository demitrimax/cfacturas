<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Acuerdos</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Datos Bancarios</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Empresas Facturadoras</a></li>
              @can('documentos-list')
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Expediente</a></li>
              @endcan
              @if($clientes->personafisica == 1)
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Cumplimientos y Obligaciones</a></li>
              @endif
              @can('datoscontacto-list')
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Datos de Contacto</a></li>
              @endcan
              @can('cliente-saldos')
              <li class=""><a href="#tab_10" data-toggle="tab" aria-expanded="false">Saldos</a></li>
              @endcan
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @include('clientes.tabinfo')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('clientes.tabacuerdos')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
              @include('clientes.tabdatbancarios')
              </div>
              <div class="tab-pane" id="tab_4">
                @include('clientes.tabempfac')
              </div>
              <div class="tab-pane" id="tab_5">
                @can('documentos-list')
                  @include('clientes.tabdocumentos')
                @endcan
              </div>
              @if($clientes->personafisica == 1)
              <div class="tab-pane" id="tab_6">
                @include('clientes.tabcump')
              </div>
              @endif
              @can('datoscontacto-list')
              <div class="tab-pane" id="tab_7">
                @include('clientes.tabdatoscontacto')
              </div>
              @endcan
              @can('cliente-saldos')
              <div class="tab-pane" id="tab_10">
                @include('clientes.tabsaldos')
              </div>
              @endcan

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
