@extends('layouts.app')
@section('title',config('app.name').' | Agregar Banco ')
@section('content')
    <section class="content-header">
        <h1>
            Alta de Nuevo "Banco"
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                    {!! Form::open(['route' => 'catBancos.store']) !!}

                        @include('cat_bancos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
