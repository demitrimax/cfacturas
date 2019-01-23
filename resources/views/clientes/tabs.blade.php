<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Acuerdos</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Datos Bancarios</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Empresas Facturadoras</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Expediente</a></li>
              @can('datosfiscales-list')
              <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Datos Fiscales</a></li>
              @endcan
              @can('datoscontacto-list')
              <li class=""><a href="#tab_7" data-toggle="tab" aria-expanded="false">Datos de Contacto</a></li>
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
                @include('clientes.tabdocumentos')
              </div>
              @can('datosfiscales-list')
              <div class="tab-pane" id="tab_6">
                @include('clientes.tabdireccion')
              </div>
              @endcan
              @can('datoscontacto-list')
              <div class="tab-pane" id="tab_7">
                @include('clientes.tabdatoscontacto')
              </div>
              @endcan
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
