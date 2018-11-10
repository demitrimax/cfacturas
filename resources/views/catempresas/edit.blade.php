@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catempresas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-12">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($catempresas, ['route' => ['catempresas.update', $catempresas->id], 'method' => 'patch']) !!}

                        @include('catempresas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
     </div>
   </div>
@endsection