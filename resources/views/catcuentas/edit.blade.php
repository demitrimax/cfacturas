@extends('layouts.app')
@section('title',config('app.name').' | Editar Cuenta ')
@section('content')
    <section class="content-header">
        <h1>
            Editar datos de Cuenta Bancaria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
    <div class="row">
      <div class="col-md-6">
       <div class="box box-primary">
           <div class="box-body">

                   {!! Form::model($catcuentas, ['route' => ['catcuentas.update', $catcuentas->id], 'method' => 'patch']) !!}

                        @include('catcuentas.upfields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
 </div>
@endsection
