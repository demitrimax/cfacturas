@extends('layouts.app')
@section('title',config('app.name').' | Catálogo de Empresas' )
@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-building"></i>Empresas Facturadoras</h1>
        <h1 class="pull-right">
          @can('empresas-create')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('catempresas.create') !!}">Agregar Empresa</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('catempresas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
