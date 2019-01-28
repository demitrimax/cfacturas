@extends('layouts.app')
@section('title',config('app.name').' | Alta de Facturas' )
@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('adminlte/bower_components/iCheck/skins/all.css')}}">
@endsection
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
@section('scripts')

@stack('scripts')

@endsection
