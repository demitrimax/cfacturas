@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catdocumentos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($catdocumentos, ['route' => ['catdocumentos.update', $catdocumentos->id], 'method' => 'patch']) !!}

                        @include('catdocumentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection