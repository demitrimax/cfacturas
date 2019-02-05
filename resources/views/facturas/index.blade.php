@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-file-text-o"></i> Facturas</h1>
        <h1 class="pull-right">
          @can('facturas-create')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('facturas.create') !!}">Agregar Nueva Factura</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('facturas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
