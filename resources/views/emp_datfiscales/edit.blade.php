@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Emp Datfiscales
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empDatfiscales, ['route' => ['empDatfiscales.update', $empDatfiscales->id], 'method' => 'patch']) !!}

                        @include('emp_datfiscales.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection