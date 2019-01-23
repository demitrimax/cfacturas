@extends('layouts.app')
@section('title','Consorcio Comercial | '.$catempresas->nombre)
@section('content')
    @include('flash::message')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="content-header">
        <h1>
            Empresa {!! $catempresas->nombre !!}
        </h1>
    </section>

<div class="content">
    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Información</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Acuerdos</a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Datos Bancarios</a></li>
                  <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Expediente</a></li>
                  <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Datos Fiscales</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @include('catempresas.tabinfo')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                      @include('catempresas.tabcuentas')
                  </div>
                  <div class="tab-pane" id="tab_4">
                      @include('catempresas.tabdocumentos')
                  </div>
                  <div class="tab-pane" id="tab_5">

                  </div>
                  @can('datosfiscales-list')
                  <div class="tab-pane" id="tab_6">
                    @include('catempresas.tabdatfiscales')
                  </div>
                  @endcan
                  @can('datoscontacto-list')
                  <div class="tab-pane" id="tab_7">

                  </div>
                  @endcan
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
</div>
@endsection

@section('scripts')

@stack('scripts')

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
