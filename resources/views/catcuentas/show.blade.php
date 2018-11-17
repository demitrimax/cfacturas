@extends('layouts.app')
@section('title',config('app.name').' | Cuenta Bancaria ')
@section('content')
    <section class="content-header">
        <h1>
            Cuenta Bancaria {{$catcuentas->catBanco->nombre.' '.$catcuentas->numcuenta}}
        </h1>
    </section>
    <div class="content">
      <div class="row" style="padding-left: 20px">
        <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">

                    @include('catcuentas.show_fields')
                    <a href="{!! route('catcuentas.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
          <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">

                        @include('catcuentas.estado_cuenta')

                    </div>
                </div>

          </div>
      </div>
    </div>
@endsection
