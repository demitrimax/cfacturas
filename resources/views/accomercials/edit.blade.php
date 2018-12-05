@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acuerdo Comercial
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($accomercial, ['route' => ['accomercials.update', $accomercial->id], 'method' => 'patch']) !!}

                        @include('accomercials.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
