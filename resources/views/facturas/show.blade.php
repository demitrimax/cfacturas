@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> Factura {{ $facturas->foliofac }}
        </h1>
    </section>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">

                    @include('facturas.show_fields')
                    <a href="{!! route('facturas.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
