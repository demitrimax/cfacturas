@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Empresas Datos Fiscales </h1>
        <h1 class="pull-right">
          @can('empdatfiscales-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('empDatfiscales.create') !!}">Agregar Nuevo</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @can('empdatfiscales-list')
        <div class="box box-primary">
            <div class="box-body">
                    @include('emp_datfiscales.table')
            </div>
        </div>
        @endcan
        <div class="text-center">

        </div>
    </div>
@endsection
