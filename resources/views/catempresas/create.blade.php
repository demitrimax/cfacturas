@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nueva Empresa Facturadora' )
@section('content')
    <section class="content-header">
        <h1>
            Alta de Nueva Empresa Facturadora
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
    <div class="row">


                    {!! Form::open(['route' => 'catempresas.store']) !!}

                        @include('catempresas.fields')

                    {!! Form::close() !!}
                  </div>

        </div>
@endsection
