@extends('layouts.app')
@section('title',config('app.name').' | Editar tipo de movimiento ')
@section('content')
    <section class="content-header">
        <h1>
            Cattmovimiento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-12">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($cattmovimiento, ['route' => ['cattmovimientos.update', $cattmovimiento->id], 'method' => 'patch']) !!}

                        @include('cattmovimientos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
 </div>
@endsection
