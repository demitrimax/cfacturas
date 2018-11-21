@extends('layouts.app')
@section('title','Consorcio Comercial | '.$clientes->nombre)
@section('content')

    @include('flash::message')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <section class="content-header">
        <h1>
            Clientes
        </h1>
    </section>
  <div class="content">
    <div class="box box-primary">
      <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <a href="#" data-toggle="modal" data-target="#modal-fotoperfil">
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset($avatar)}}" alt="User Avatar" width="40">
              </div>
              </a>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{!! $clientes->nombre." ".$clientes->apellidopat." ".$clientes->apellidomat !!}</h3>
              <h5 class="widget-user-desc">Cliente desde: {!! $clientes->created_at->format('M. Y') !!}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Feha de Nacimiento <span class="pull-right">N/D</span></a></li>
                <li><a href="#">RFC <span class="pull-right">{!! $clientes->RFC !!}</span></a></li>
                <li><a href="#">CURP <span class="pull-right">{!! $clientes->CURP !!}</span></a></li>
                <li><a href="#">Fecha de Alta <span class="pull-right">{!! $clientes->created_at !!}</span></a></li>
                <li><a href="{!! route('clientes.index') !!}" class="btn btn-success pull-right">Regresar</a></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    <div class="content">
        @can('contacto-list')
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
                    @can('contacto-edit')
                    <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                    @endcan
                    @can('contacto-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDeleteContacto(".$datcontacto->id.")"]) !!}
                                        {!! Form::hidden('redirect', 'clientes.show') !!}
                                        {!! Form::hidden('cliente_id', $clientes->id) !!}
                    @endcan
                  </div>
                  {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody></table>
              <h1 class="pull-right">
                @can('contacto-create')
                 <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datcontacto">Agregar dato de contacto</button>
                @endcan
              </h1>
            </div>
            <!-- /.box-body -->

          </div>
          @endcan
          @can('direccion-list')
          <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Datos Fiscales</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-condensed">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>RFC</th>
                    <th>Razón Social</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Acciones</th>
                  </tr>
                @foreach($clientes->direcciones as$key=>$direccion)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$direccion->RFC}}</td>
                    <td>{{$direccion->razonsocial}}</td>
                    <td>{{$direccion->calle.' '.$direccion->numeroExt.' '.$direccion->numeroInt}}</td>
                    <td>{{$direccion->estados->nombre}}</td>
                    <td>{{$direccion->municipios->nomMunicipio}}</td>
                    <td>
                        {!! Form::open(['route' => ['direcciones.destroy', $direccion->id], 'method' => 'delete', 'id'=>'datFiscalesForm'.$direccion->id]) !!}
                      @can('direccion-edit')
                      <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i></button>
                      @endcan
                      @can('direccion-delete')
                      <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeletedatFiscales({{$direccion->id}})"> <i class="fa fa-remove"></i></button>
                        {!! Form::hidden('redirect', 'clientes.show') !!}
                        {!! Form::hidden('cliente_id', $clientes->id) !!}
                        {!! Form::close() !!}
                        @endcan
                    </td>
                  </tr>
                  @endforeach
                </tbody></table>
                <h1 class="pull-right">
                  @can('direccion-create')
                   <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-direccion">Agregar Datos Fiscales</button>
                  @endcan
                </h1>
              </div>
              <!-- /.box-body -->

            </div>
            @endcan
            @can('documentos-list')
            <div class="box box-default">
                <div class="box-header">
                  <h3 class="box-title">Documentos del Cliente</h3>
                  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Tipo de Documento</th>
                      <th>Documento</th>
                      <th>Nota</th>
                      <th>Acciones</th>
                    </tr>
                  @foreach($clientes->catdocumentos as$key=>$documento)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$documento->cattipodoc->tipo}}</td>
                      <td><a href="{!! asset($documento->archivo) !!}" target="_blank"> Documento </a></td>
                      <td>{{$documento->nota}}</td>
                      <td>
                        {!! Form::open(['route' => ['catdocumentos.destroy', $documento->id], 'method' => 'delete', 'id'=>'delDocumento'.$documento->id]) !!}
                        @can('documentos-edit')
                        <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                        @endcan
                        @can('documentos-delete')
                        <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteDocumento({{$documento->id}})"> <i class="fa fa-remove"></i></button>
                          {!! Form::hidden('redirect', 'clientes.show') !!}
                          {!! Form::hidden('cliente_id', $clientes->id) !!}
                          @endcan
                        {!! Form::close() !!}
                      </td>
                    </tr>
                    @endforeach
                  </tbody></table>
                  <h1 class="pull-right">
                    @can('documentos-create')
                     <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-documento">Agregar Documento</button>
                    @endcan
                  </h1>
                </div>
                <!-- /.box-body -->

              </div>
              @endcan
              @can('catcuentas-list')
              <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Cuentas del Cliente</h3>
                    <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Número de Cuenta</th>
                        <th>Banco</th>
                        <th>Sucursal</th>
                        <th>Acciones</th>
                      </tr>
                    @foreach($clientes->catcuentas as$key=>$cuenta)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$cuenta->numcuenta}}</td>
                        <td>{{$cuenta->catBanco->nombre}} </a></td>
                        <td>{{$cuenta->sucursal}}</td>
                        <td>
                          {!! Form::open(['route' => ['catcuentas.destroy', $cuenta->id], 'method' => 'delete', 'id'=>'delCuenta'.$cuenta->id]) !!}
                          @can('catcuentas-edit')
                          <button type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </button>
                          @endcan
                          @can('catcuentas-delete')
                          <button type="button" class="btn btn-danger" rel="tooltip" title="Eliminar" Onclick="ConfirmDeleteCuenta({{$cuenta->id}})"> <i class="fa fa-remove"></i></button>
                            {!! Form::hidden('redirect', 'clientes.show') !!}
                            {!! Form::hidden('cliente_id', $clientes->id) !!}
                          @endcan
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody></table>
                    <h1 class="pull-right">
                      @can('catcuentas-create')
                       <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-cuenta">Agregar Cuenta</button>
                      @endcan
                    </h1>
                  </div>
                  <!-- /.box-body -->

                </div>
                @endcan
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
      @can('direccion-create')
      <div class="modal fade" id="modal-direccion">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Agregar Datos Fiscales</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'direcciones.store']) !!}
                    <!-- RFC Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('RFC', 'RFC:') !!}
                        {!! Form::text('RFC', null, ['class' => 'form-control','onchange'=>'validarRFC(this)']) !!}
                        <pre id="resultado"></pre>
                    </div>

                    <!-- Razon Social Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('razonsocial', 'Razón Social:') !!}
                        {!! Form::text('razonsocial', null, ['class' => 'form-control', 'required']) !!}
                    </div>
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
                  <button type="submit" class="btn btn-primary" id="subdatfiscales" disabled>Agregar Datos Fiscales</button>
                </div>
                {!! Form::close() !!}
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        @endcan
        @can('clientes-edit')
        <div class="modal fade" id="modal-fotoperfil">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modificar Foto de Perfil</h4>
                  </div>
                  <div class="modal-body">
                      {!! Form::open(['url' => 'clientes/avatarchange', 'enctype' => 'multipart/form-data']) !!}
                  <div>
                      Actualice la foto del cliente.
                      {!! Form::file('avatarimg',['accept'=>'image/*']) !!}
                      {!! Form::hidden('cliente_id', $clientes->id) !!}
                      <img class="profile-user-img img-responsive img-circle" src="{{asset($avatar)}}" alt="User profile picture">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    @can('clientes-edit')
                    <button type="submit" class="btn btn-primary" id="actualizafoto">Actualizar Foto</button>
                    @endcan
                  </div>
                  {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
          </div>
          @endcan

          <div class="modal fade" id="modal-documento">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Agregar Documento</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => 'catdocumentos.store', 'enctype' => 'multipart/form-data']) !!}

                    {!! Form::hidden('cliente_id', $clientes->id) !!}
                    {!! Form::hidden('redirect', 'clientes.show') !!}
                    <div class="form-group">
                        {!! Form::label('tipodoc', 'Tipo de Documento:') !!}
                        {!! Form::select('tipodoc', $tipodocs, null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Archivo Field -->
                    <div class="form-group">
                        {!! Form::label('archivo', 'Archivo:') !!}
                        {!! Form::file('archivo', ['class' => 'form-control'])!!}
                    </div>
                    <div class="clearfix"></div>

                    <!-- Nota Field -->
                    <div class="form-group">
                        {!! Form::label('nota', 'Nota:') !!}
                        {!! Form::text('nota', null, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" id="agregardoc">Agregar Documento</button>
                    </div>
                    {!! Form::close() !!}

                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>

            <div class="modal fade" id="modal-cuenta">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Agregar Cuenta Bancaria</h4>
                      </div>
                      <div class="modal-body">
                          {!! Form::open(['route' => 'catcuentas.store']) !!}

                      {!! Form::hidden('cliente_id', $clientes->id) !!}
                      {!! Form::hidden('redirect', 'clientes.show') !!}
                      <!-- Banco Id Field -->
                      <div class="form-group">
                          {!! Form::label('banco_id', 'Banco:') !!}
                          {!! Form::select('banco_id', $bancos, null, ['class' => 'form-control']) !!}
                      </div>

                      <!-- Numcuenta Field -->
                      <div class="form-group">
                          {!! Form::label('numcuenta', 'Número de cuenta:') !!}
                          {!! Form::text('numcuenta', null, ['class' => 'form-control', 'required'=>'true', 'maxlength'=>'10']) !!}
                      </div>

                      <!-- Clabeinterbancaria Field -->
                      <div class="form-group">
                          {!! Form::label('clabeinterbancaria', 'Clabe Interbancaria:') !!}
                          {!! Form::text('clabeinterbancaria', null, ['class' => 'form-control', 'maxlength'=>'18']) !!}
                      </div>

                      <!-- Sucursal Field -->
                      <div class="form-group">
                          {!! Form::label('sucursal', 'Sucursal:') !!}
                          {!! Form::text('sucursal', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                      </div>

                      <!-- Swift Field -->
                      <div class="form-group">
                          {!! Form::label('swift', 'Swift:') !!}
                          {!! Form::text('swift', null, ['class' => 'form-control', 'maxlength'=>'30']) !!}
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="agregardoc">Agregar Cuenta</button>
                      </div>
                      {!! Form::close() !!}

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
//Confirmación Eliminar datos de Contacto
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

function ConfirmDeletedatFiscales(id) {
swal({
      title: '¿Estás seguro?',
      text: 'Se eliminará la información los datos fiscales.',
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Continuar',
      }).then((result) => {
if (result.value) {
  document.forms['datFiscalesForm'+id].submit();
  }
})
}

function ConfirmDeleteDocumento(id) {
swal({
      title: '¿Estás seguro?',
      text: 'Se eliminará el documento seleccionado.',
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Continuar',
      }).then((result) => {
if (result.value) {
  document.forms['delDocumento'+id].submit();
  }
})
}
function ConfirmDeleteCuenta(id) {
swal({
      title: '¿Estás seguro?',
      text: 'Se eliminará la cuenta bancaria seleccinada.',
      type: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Continuar',
      }).then((result) => {
if (result.value) {
  document.forms['delCuenta'+id].submit();
  }
})
}

//Función para validar un RFC
// Devuelve el RFC sin espacios ni guiones si es correcto
// Devuelve false si es inválido
// (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
function rfcValido(rfc, aceptarGenerico = true) {
    const re       = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var   validado = rfc.match(re);

    if (!validado)  //Coincide con el formato general del regex?
        return false;

    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
          rfcSinDigito      = validado.slice(1).join(''),
          len               = rfcSinDigito.length,

    //Obtener el digito esperado
          diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
          indice            = len + 1;
    var   suma,
          digitoEsperado;

    if (len == 12) suma = 0
    else suma = 481; //Ajuste para persona moral

    for(var i=0; i<len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";

    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
     && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}


//Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarRFC(input) {
    var rfc         = input.value.trim().toUpperCase(),
        resultado   = document.getElementById("resultado"),
        valido;

    var rfcCorrecto = rfcValido(rfc);   // ⬅️ Acá se comprueba

    if (rfcCorrecto) {
    	valido = "Válido";
      resultado.classList.add("ok");
      document.getElementById("subdatfiscales").removeAttribute("disabled");
    } else {
    	valido = "No válido"
    	resultado.classList.remove("ok");
      document.getElementById("subdatfiscales").disabled=true;
    }

    resultado.innerText = "RFC: " + rfc
                        + "\nFormato: " + valido;
}

</script>
@endsection
