@extends('layouts.app')
@section('title',config('app.name').' | Registrar Tipos de Movimientos ')
@section('content')
    <section class="content-header">
        <h1>
            Registrar tipo de movimiento
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
      <div class="row">
        <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                    {!! Form::open(['route' => 'cattmovimientos.store']) !!}

                        @include('cattmovimientos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
