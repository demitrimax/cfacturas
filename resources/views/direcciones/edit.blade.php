@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Direcciones
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($direcciones, ['route' => ['direcciones.update', $direcciones->id], 'method' => 'patch']) !!}

                        @include('direcciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection