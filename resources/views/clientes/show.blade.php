@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Clientes
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
                  @include('flash::message')
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
                  <th>Contacto</th>
                  <th>Acciones</th>
                </tr>
              @foreach($clientes->datcontacto as$key=>$datcontacto)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$datcontacto->tipo}}</td>
                  <td>{{$datcontacto->contacto}}</td>
                  <td>
                    {!! Form::open(['route' => ['datcontactos.destroy', $datcontacto->id], 'method' => 'delete', 'id'=>'contactform'.$datcontacto->id]) !!}
                    <div class='btn-group'>
                    <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDeleteContacto(".$datcontacto->id.")"]) !!}
                                        {!! Form::hidden('redirect', 'clientes.show') !!}
                                        {!! Form::hidden('cliente_id', $clientes->id) !!}
                  </div>
                  {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody></table>
              <h1 class="pull-right">
                 <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datcontacto">Agregar dato de contacto</button>
              </h1>
            </div>
            <!-- /.box-body -->

          </div>
          <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Direcciones</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-condensed">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Tipo</th>
                    <th>Colonia</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Acciones</th>
                  </tr>
                @foreach($clientes->direcciones as$key=>$direccion)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$direccion->calle.' '.$direccion->numeroExt.' '.$direccion->numeroInt}}</td>
                    <td>{{$direccion->colonia}}</td>
                    <td>{{$direccion->estados->nombre}}</td>
                    <td>{{$direccion->municipios->nomMunicipio3}}</td>
                    <td><button class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button> <button class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteContacto({{$direccion->id}})"> <i class="fa fa-remove"></i></button></td>
                  </tr>
                  @endforeach
                </tbody></table>
                <h1 class="pull-right">
                   <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-direccion">Agregar Dirección</button>
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
                  {!! Form::open(['route' => 'datcontactos.store']) !!}
                <div class="form-group col-sm-6">
                    {!! Form::label('tipo', 'Tipo:') !!}
                    {!! Form::select('tipo', ['telefono' => 'telefono', 'email' => 'email', 'whatsapp' => 'whatsapp'], null, ['class' => 'form-control']) !!}
                <!-- Contacto Field -->
              </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('contacto', 'Contacto:') !!}
                    {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
                </div>
                    {!! Form::hidden('cliente_id', $clientes->id) !!}
                    {!! Form::hidden('redirect', 'clientes.show') !!}

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
      </div>

      <div class="modal fade" id="modal-direccion">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Agregar Dirección</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'direcciones.store']) !!}
                    <!-- Calle Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('calle', 'Calle:') !!}
                        {!! Form::text('calle', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- Numeroext Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('numeroExt', 'Numero Exterior:') !!}
                        {!! Form::text('numeroExt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                    </div>

                    <!-- Numeroint Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('numeroInt', 'Numero Interior:') !!}
                        {!! Form::text('numeroInt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                    </div>

                    <!-- Estado Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('estado_id', 'Estado:') !!}
                        {!! Form::select('estado_id', $estados, null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    <!-- Municipio Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('municipio_id', 'Municipio:') !!}
                        {!! Form::select('municipio_id', ['Seleccione uno'], null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <!-- Colonia Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('colonia', 'Colonia:') !!}
                        {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Codpostal Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('codpostal', 'Código postal:') !!}
                        {!! Form::text('codpostal', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Referencias Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('referencias', 'Referencias:') !!}
                        {!! Form::textarea('referencias', null, ['class' => 'form-control', 'rows'=>'5', 'cols'=>'5']) !!}
                    </div>

                      <div class="form-group col-sm-12 col-lg-12">
                      {!! Form::hidden('cliente_id', $clientes->id) !!}
                      {!! Form::hidden('redirect', 'clientes.show') !!}
                      </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Agregar Dirección</button>
                </div>
                {!! Form::close() !!}
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
@endsection
@section('scripts')
<script>
  $('#estado_id').on('change', function(e) {
    //console.log(e);
    var estado_id = e.target.value;
    //ajax
    $.get('/GetMunicipios/'+estado_id, function(data) {
      //exito al obtener los datos
      //console.log(data);
      $('#municipio_id').empty();
      $.each(data, function(index, Municipios) {
        $('#municipio_id').append('<option value ="' + Municipios.id + '">'+Municipios.nomMunicipio+'</option>' );
      });
    });
  });
  function ConfirmDeleteContacto(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminará la información de contacto.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['contactform'+id].submit();
  }
})
}
</script>
@endsection
