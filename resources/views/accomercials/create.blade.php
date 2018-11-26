@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Accomercial
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'accomercials.store']) !!}

                        @include('accomercials.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
