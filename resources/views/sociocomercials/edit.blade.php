@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sociocomercial
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">


                   {!! Form::model($sociocomercial, ['route' => ['sociocomercials.update', $sociocomercial->id], 'method' => 'patch']) !!}

                        @include('sociocomercials.upfields')

                   {!! Form::close() !!}

   </div>
 </div>
@endsection
