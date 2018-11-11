@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Catálogo de Bancos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('cat_bancos.show_fields')
                    <a href="{!! route('catBancos.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
