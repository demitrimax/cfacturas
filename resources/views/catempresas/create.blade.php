@extends('layouts.app')
@section('title',config('app.name').' | Crear Empresa' )
@section('content')
    <section class="content-header">
        <h1>
            Alta de Empresas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">


                    {!! Form::open(['route' => 'catempresas.store']) !!}

                        @include('catempresas.fields')

                    {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
