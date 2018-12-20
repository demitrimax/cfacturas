@extends('layouts.app')
@section('title',config('app.name').' | Editar Método de Pago' )

@section('content')
    <section class="content-header">
        <h1>
            Métodos de pago
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pagometodo, ['route' => ['pagometodos.update', $pagometodo->id], 'method' => 'patch']) !!}

                        @include('pagometodos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
