@extends('layouts.app')
@section('title',config('app.name').' | Cuenta Bancaria ')
@section('content')
    <section class="content-header">
        <h1>
            Cuenta Bancaria {{$catcuentas->catBanco->nombre.' '.$catcuentas->numcuenta}}
        </h1>
    </section>
    <div class="content">
      <div class="row">
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
                <div class="box-body table-responsive no-padding">

                        @include('catcuentas.estado_cuenta')

                    </div>
                </div>

          </div>
      </div>
      @can('movbancario-list')
      <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body table-responsive no-padding">

                @include('catcuentas.movcuentas')

            </div>
          </div>
        </div>

      </div>
    @endcan
    </div>

    <div class="modal fade" id="modal-addmov">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Movimiento</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(['url' => 'catcuentas/agregarmov']) !!}


                      {!! Form::hidden('cuenta_id',$catcuentas->id) !!}
                  <!-- Toperacion Field -->
                  <div class="form-group">
                      {!! Form::label('toperacion', 'Tipo de operacion:') !!}
                      {!! Form::select('toperacion', ['cargo'=>'Cargo','abono'=>'Abono'],null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Tmovimiento Field -->
                  <div class="form-group">
                      {!! Form::label('tmovimiento', 'Tipo de movimiento:') !!}
                      {!! Form::select('tmovimiento', $cattmovimiento,null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Concepto Field -->
                  <div class="form-group">
                      {!! Form::label('concepto', 'Concepto:') !!}
                      {!! Form::text('concepto', null, ['class' => 'form-control', 'maxlength' => '190', 'required']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('metodo', 'Metodo de Págo:') !!}
                      {!! Form::select('metodo', $pagometodo, null,['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('referencia', 'Referencia Alfanumerica:') !!}
                      {!! Form::text('referencia', null, ['class' => 'form-control', 'maxlength' => '15']) !!}
                  </div>

                  <!-- Monto Field -->
                  <div class="form-group">
                      {!! Form::label('monto', 'Monto:') !!}
                      {!! Form::number('monto', null, ['class' => 'form-control', 'step' => '0.01']) !!}
                  </div>


                      {!! Form::hidden('user_id', Auth::User()->id) !!}


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection
