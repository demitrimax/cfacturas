@extends('layouts.app')
@section('title',config('app.name').' | Cuentas Bancarias ')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cuentas Bancarias</h1>
        <h1 class="pull-right">
          @can('catcuentas-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('catcuentas.create') !!}">Agregar Nueva Cuenta</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">
                    @include('catcuentas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
