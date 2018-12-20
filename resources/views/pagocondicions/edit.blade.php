@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagocondicion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pagocondicion, ['route' => ['pagocondicions.update', $pagocondicion->id], 'method' => 'patch']) !!}

                        @include('pagocondicions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection