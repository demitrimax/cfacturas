@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-check-square-o"></i> Acuerdos Comerciales</h1>
        <h1 class="pull-right">
          @can('accomerciales-create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('accomercials.create') !!}">Alta de Nuevo Acuerdo</a>
          @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('accomercials.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
