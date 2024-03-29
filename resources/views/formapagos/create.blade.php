@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forma de pago
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'formapagos.store']) !!}

                        @include('formapagos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
