@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catgiroempresa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($catgiroempresa, ['route' => ['catgiroempresas.update', $catgiroempresa->id], 'method' => 'patch']) !!}

                        @include('catgiroempresas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
 </div>
@endsection
