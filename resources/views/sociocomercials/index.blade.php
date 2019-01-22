@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Socios Comerciales</h1>

        <h1 class="pull-right">
            @can('sociocomercial-create')
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('sociocomercials.create') !!}">Agregar Nuevo</a>
            @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                  @can('sociocomercial-list')
                    @include('sociocomercials.table')
                  @endcan
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
