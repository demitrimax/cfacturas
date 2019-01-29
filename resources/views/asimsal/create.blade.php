@extends('layouts.app')
@section('title','Control de Facturas | Alta de Clientes')

@section('content')
    <section class="content-header">
        <h1>
            Clientes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')


            <div class="row">
              <div class="col-md-6">
                        <div class="box box-primary">
                                      <div class="box-body">


                    {!! Form::open(['route' => 'asimilados.store']) !!}

                        @include('asimsal.fields')

                    {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
