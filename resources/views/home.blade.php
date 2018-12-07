@extends('layouts.app')

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>0</h3>

                  <p>Acuerdos Comerciales Activos</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Ratio de Aceptación</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$nclientes}}</h3>

                  <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/clientes')}}" class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$nsolicitudes}}</h3>

                  <p>Solicitudes Pendientes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más Información<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable ui-sortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                  <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                  <li><a href="#sales-chart" data-toggle="tab">Dona</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Ventas</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="897" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.515625" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,261H872" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,202H872" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,143H872" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="84.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,84.00000000000003H872" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.515625" y="25.00000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M62.015625,25.00000000000003H872" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="723.421528498557" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="363.1915274859501" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><path fill="#74a5c2" stroke="none" d="M62.015625,219.05493333333334C84.6427769875576,219.56626666666668,129.8970809626728,222.6231049981125,152.52423295023038,221.10026666666667C175.16163738544884,219.57673833144582,220.43644625588578,209.1350666666667,243.07385069110424,206.86946666666668C265.4754488301225,204.6274666666667,310.2786451081591,204.88256480506598,332.6802432471774,203.06986666666666C355.0715889385348,201.2579981383993,399.8542803212496,194.91349669779092,422.245626012607,192.3712C444.87277800016454,189.80213003112425,490.1270819752798,182.51724094375237,512.7542339628374,182.6244C535.3916383980559,182.73160761041905,580.6664472684927,204.17807818499128,603.3038517037112,193.22866666666667C625.7054498427294,182.3933115183246,670.5086461207661,101.94542370540854,692.9102442597843,95.48533333333336C715.0555312072806,89.09915703874188,759.3461051022733,135.13648756583467,781.4913920497696,141.8436C804.1185440373272,148.69665423250134,849.3728480124424,147.7554,872,149.726L872,261L62.015625,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M62.015625,219.05493333333334C84.6427769875576,219.56626666666668,129.8970809626728,222.6231049981125,152.52423295023038,221.10026666666667C175.16163738544884,219.57673833144582,220.43644625588578,209.1350666666667,243.07385069110424,206.86946666666668C265.4754488301225,204.6274666666667,310.2786451081591,204.88256480506598,332.6802432471774,203.06986666666666C355.0715889385348,201.2579981383993,399.8542803212496,194.91349669779092,422.245626012607,192.3712C444.87277800016454,189.80213003112425,490.1270819752798,182.51724094375237,512.7542339628374,182.6244C535.3916383980559,182.73160761041905,580.6664472684927,204.17807818499128,603.3038517037112,193.22866666666667C625.7054498427294,182.3933115183246,670.5086461207661,101.94542370540854,692.9102442597843,95.48533333333336C715.0555312072806,89.09915703874188,759.3461051022733,135.13648756583467,781.4913920497696,141.8436C804.1185440373272,148.69665423250134,849.3728480124424,147.7554,872,149.726" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.015625" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="152.52423295023038" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="243.07385069110424" cy="206.86946666666668" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.6802432471774" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="422.245626012607" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="512.7542339628374" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="603.3038517037112" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="692.9102442597843" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="781.4913920497696" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="872" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf3f6" stroke="none" d="M62.015625,240.02746666666667C84.6427769875576,239.8072,129.8970809626728,241.35446642506605,152.52423295023038,239.1464C175.16163738544884,236.93733309173274,220.43644625588578,223.3365417102967,243.07385069110424,222.35893333333334C265.4754488301225,221.39150837696334,310.2786451081591,233.23306051728085,332.6802432471774,231.36626666666666C355.0715889385348,229.5003271839475,399.8542803212496,209.28948157595082,422.245626012607,207.428C444.87277800016454,205.54691490928414,490.1270819752798,214.43960989052474,512.7542339628374,216.39600000000002C535.3916383980559,218.3532765571914,580.6664472684927,232.37735986038396,603.3038517037112,223.08266666666668C625.7054498427294,213.8847931937173,670.5086461207661,148.22814457230535,692.9102442597843,142.42573333333334C715.0555312072806,136.68971123897202,759.3461051022733,170.46889944279064,781.4913920497696,176.92893333333336C804.1185440373272,183.529532776124,849.3728480124424,190.23343333333335,872,194.66826666666668L872,261L62.015625,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M62.015625,240.02746666666667C84.6427769875576,239.8072,129.8970809626728,241.35446642506605,152.52423295023038,239.1464C175.16163738544884,236.93733309173274,220.43644625588578,223.3365417102967,243.07385069110424,222.35893333333334C265.4754488301225,221.39150837696334,310.2786451081591,233.23306051728085,332.6802432471774,231.36626666666666C355.0715889385348,229.5003271839475,399.8542803212496,209.28948157595082,422.245626012607,207.428C444.87277800016454,205.54691490928414,490.1270819752798,214.43960989052474,512.7542339628374,216.39600000000002C535.3916383980559,218.3532765571914,580.6664472684927,232.37735986038396,603.3038517037112,223.08266666666668C625.7054498427294,213.8847931937173,670.5086461207661,148.22814457230535,692.9102442597843,142.42573333333334C715.0555312072806,136.68971123897202,759.3461051022733,170.46889944279064,781.4913920497696,176.92893333333336C804.1185440373272,183.529532776124,849.3728480124424,190.23343333333335,872,194.66826666666668" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="62.015625" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="152.52423295023038" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="243.07385069110424" cy="222.35893333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="332.6802432471774" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="422.245626012607" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="512.7542339628374" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="603.3038517037112" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="692.9102442597843" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="781.4913920497696" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="872" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 810.953px; top: 109px; display: none;"><div class="morris-hover-row-label">2013 Q2</div><div class="morris-hover-point" style="color: #a0d0e0">
      Item 1:
      8,432
    </div><div class="morris-hover-point" style="color: #3c8dbc">
      Item 2:
      5,713
    </div></div></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"><svg height="300" version="1.1" width="927" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3c8dbc" d="M463.5,243.33333333333331A93.33333333333333,93.33333333333333,0,0,0,551.727755194977,180.44625304313007" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3c8dbc" stroke="#ffffff" d="M463.5,246.33333333333331A96.33333333333333,96.33333333333333,0,0,0,554.5636473262442,181.4248826052307L591.1151459070204,194.03833029452744A135,135,0,0,1,463.5,285Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f56954" d="M551.727755194977,180.44625304313007A93.33333333333333,93.33333333333333,0,0,0,379.78484627831415,108.73398312817662" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#f56954" stroke="#ffffff" d="M554.5636473262442,181.4248826052307A96.33333333333333,96.33333333333333,0,0,0,377.09400205154566,107.40757544301087L337.92726941747117,88.10097469226493A140,140,0,0,1,595.8416327924656,195.6693795646951Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00a65a" d="M379.78484627831415,108.73398312817662A93.33333333333333,93.33333333333333,0,0,0,463.47067846904883,243.333328727518" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00a65a" stroke="#ffffff" d="M377.09400205154566,107.40757544301087A96.33333333333333,96.33333333333333,0,0,0,463.46973599126824,246.3333285794739L463.4575884998742,284.9999933380171A135,135,0,0,1,342.4120097954186,90.31165416754118Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="463.5" y="140" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1,0,0,1,0,0)"><tspan dy="140" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">In-Store Sales</tspan></text><text x="463.5" y="160" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1,0,0,1,0,0)"><tspan dy="160" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30</tspan></text></svg></div>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->



              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                  <i class="ion ion-clipboard"></i>

                  <h3 class="box-title">Solicitudes Pendientes</h3>

                  <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">«</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                  <ul class="todo-list ui-sortable">
                  @foreach($detsolicitudes as $solicitud)
                    <li>
                      <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                      <!-- checkbox -->
                      <input type="checkbox" value="">
                      <!-- todo text -->
                      <span class="text">{{ strip_tags($solicitud->concepto)}}</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> 10 años</small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                  <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar actividad</button>
                </div>
              </div>
              <!-- /.box -->


            <!-- right col -->
          </div>
          <!-- /.row (main row) -->



@endsection
