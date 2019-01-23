@extends('layouts.app')
@section('title',config('app.name').' | Alta de Acuerdo Comercial' )
@section('content')
    <section class="content-header">
        <h1>
            Alta de Acuerdo Comercial
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                    {!! Form::open(['route' => 'accomercials.store']) !!}

                        @include('accomercials.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
              <div class="box-body">
                @include('accomercials.informacion')
                {!! $blog->cuerpo !!}
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
