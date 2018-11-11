@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catálogo de Bancos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
       <div class="box box-primary">
           <div class="box-body">


                   {!! Form::model($catBancos, ['route' => ['catBancos.update', $catBancos->id], 'method' => 'patch']) !!}

                        @include('cat_bancos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
 </div>
@endsection
