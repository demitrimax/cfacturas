@extends('layouts.app')
@section('title',config('app.name').' | Alta de Movimiento Bancario' )
@section('content')
    <section class="content-header">
        <h1>
            Mbanca
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
      <div class="row">
        <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                    {!! Form::open(['route' => 'mbancas.store']) !!}

                        @include('mbancas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
