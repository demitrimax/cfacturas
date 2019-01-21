@extends('layouts.app')
@section('title',config('app.name').' | Giro de Empresa ')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Catalogo de Giro Empresa</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('catgiroempresas.create') !!}">Agregar Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('catgiroempresas.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
