@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alta de Socio Comercial
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
      <div class="row">


                    {!! Form::open(['route' => 'sociocomercials.store']) !!}

                        @include('sociocomercials.fields')

                    {!! Form::close() !!}

      </div>
    </div>
@endsection
