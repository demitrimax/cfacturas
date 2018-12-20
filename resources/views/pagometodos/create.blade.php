@extends('layouts.app')
@section('title',config('app.name').' | Alta de Método de Pago' )

@section('content')
    <section class="content-header">
        <h1>
            Alta de Método de Pago
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pagometodos.store']) !!}

                        @include('pagometodos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
