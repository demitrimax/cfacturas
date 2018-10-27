@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Datcontacto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($datcontacto, ['route' => ['datcontactos.update', $datcontacto->id], 'method' => 'patch']) !!}

                        @include('datcontactos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection