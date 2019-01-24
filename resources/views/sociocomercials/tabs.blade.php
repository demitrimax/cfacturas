<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Acuerdos</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Cuentas</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Clientes</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Expediente</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @include('sociocomercials.show_fields')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('sociocomercials.tabacuerdos')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('sociocomercials.tabclientes')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                  @include('sociocomercials.tabdocumentos')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
                @include('sociocomercials.tabacuerdos')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
