@extends('layouts.app')
@section('title',config('app.name').' | Catálogo de Documentos ')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Catálogo de Documentos</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('catdocumentos.create') !!}">Agregar Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

            <div class="box box-primary">
              <div class="box-body">
                    @include('catdocumentos.table')
              </div>
          </div>
    </div>
@endsection
