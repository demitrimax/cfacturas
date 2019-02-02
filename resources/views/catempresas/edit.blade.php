@extends('layouts.app')
@section('title',config('app.name').' | Editar Empresa' )
@section('content')
    <section class="content-header">
        <h1>
            Editar Empresa {{$catempresas->nombre }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">


                   {!! Form::model($catempresas, ['route' => ['catempresas.update', $catempresas->id], 'method' => 'patch']) !!}

                        @include('catempresas.updatefields')

                   {!! Form::close() !!}

     </div>
   </div>
@endsection
