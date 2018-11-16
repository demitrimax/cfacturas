@extends('layouts.app')
@section('title','Consorcio Comercial | Editar movimiento bancario')
@section('content')
    <section class="content-header">
        <h1>
            Mbanca
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mbanca, ['route' => ['mbancas.update', $mbanca->id], 'method' => 'patch']) !!}

                        @include('mbancas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
