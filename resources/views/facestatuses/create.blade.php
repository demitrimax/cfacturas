@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alta de Estado de Factura
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'facestatuses.store']) !!}

                        @include('facestatuses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
