@extends('layouts.app')
@section('title','Control de Facturas | Alta de Clientes')

@section('content')
    <section class="content-header">
        <h1>
            Clientes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')


            <div class="row">



                    {!! Form::open(['route' => 'asimilados.store']) !!}

                        @include('asimsal.fields')

                    {!! Form::close() !!}

        </div>
    </div>
@endsection
