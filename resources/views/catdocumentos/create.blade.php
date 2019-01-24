@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catdocumentos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
      <div class="row">
        <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
                    {!! Form::open(['route' => 'catdocumentos.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('catdocumentos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
