@extends('layouts.app')
@section('title',config('app.name').' | Alta de Facturas' )

@section('content')
    <section class="content-header">
        <h1>
            Alta de Facturas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
      <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                    {!! Form::open(['route' => 'facturas.store', 'enctype'=>'multipart/form-data']) !!}

                        @include('facturas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
