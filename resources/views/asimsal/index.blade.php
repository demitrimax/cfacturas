@extends('layouts.app')
@section('title',config('app.name').' | Catálogo de Asimilados a Salarios ')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Clientes</h1>
        <h1 class="pull-right">
          @can('asimsal-create')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('asimilados.create') !!}">Agregar Cliente</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('asimsal.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
