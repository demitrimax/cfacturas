@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Facestatus
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($facestatus, ['route' => ['facestatuses.update', $facestatus->id], 'method' => 'patch']) !!}

                        @include('facestatuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection