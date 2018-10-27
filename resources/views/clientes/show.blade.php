@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Clientes
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('clientes.show_fields')
                    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Datos de Contacto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Tipo</th>
                  <th>Dato</th>
                </tr>
              @foreach($clientes->datcontacto as $datcontacto)
                <tr>
                  <td>1.</td>
                  <td>{{$datcontacto->tipo}}</td>
                  <td>{{$datcontacto->contacto}}</td>
                </tr>
                @endforeach
              </tbody></table>
              <h1 class="pull-right">
                 <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datcontacto">Agregar dato de contacto</button>
              </h1>
            </div>
            <!-- /.box-body -->

          </div>
    </div>

    <div class="modal fade" id="modal-datcontacto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Datos de Contacto</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
                  {!! Form::open(['route' => 'datcontactos.storeDos']) !!}
                <div class="form-group col-sm-6">
                    {!! Form::label('tipo', 'Tipo:') !!}
                    {!! Form::select('tipo', ['telefono' => 'telefono', 'email' => 'email', 'whatsapp' => 'whatsapp'], null, ['class' => 'form-control']) !!}
                <!-- Contacto Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('contacto', 'Contacto:') !!}
                    {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
                </div>
                    {!! Form::hidden('cliente_id', $clientes->id) !!}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Agregar Datos</button>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

@endsection
