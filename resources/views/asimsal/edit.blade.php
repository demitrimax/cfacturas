@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Clientes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">

                   {!! Form::model($clientes, ['route' => ['asimilados.update', $clientes->id], 'method' => 'patch']) !!}

                        @include('asimsal.fupdatedir')

                   {!! Form::close() !!}

     </div>
   </div>
@endsection
