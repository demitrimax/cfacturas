@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cat Bancos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($catBancos, ['route' => ['catBancos.update', $catBancos->id], 'method' => 'patch']) !!}

                        @include('cat_bancos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection