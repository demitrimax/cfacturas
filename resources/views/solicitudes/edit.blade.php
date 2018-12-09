@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Solicitudes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($solicitudes, ['route' => ['solicitudes.update', $solicitudes->id], 'method' => 'patch']) !!}

                        @include('solicitudes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection