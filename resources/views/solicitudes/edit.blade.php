@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Solicitudes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-12">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($solicitudes, ['route' => ['solfact.update', $solicitudes->id], 'method' => 'patch']) !!}

                        @include('solicitudes.editsolicitud')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
     </div>
   </div>
@endsection
