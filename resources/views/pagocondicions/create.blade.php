@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Condición de Pago
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pagocondicions.store']) !!}

                        @include('pagocondicions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
