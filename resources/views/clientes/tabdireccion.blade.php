@can('direccion-list')
<div class="box box-warning">
    <div class="box-header">
      <h3 class="box-title">Datos Fiscales</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if($clientes->direcciones->count()>0)
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
      </tbody>
    </table>
    @else
    <p>No existen datos fiscales.</p>
    @endif
      <h1 class="pull-right">
        @can('direccion-create')
         <button type="button" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-direccion">Agregar Datos Fiscales</button>
        @endcan
      </h1>
    </div>
    <!-- /.box-body -->

  </div>
  @endcan

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
                  {!! Form::checkbox('autocomplete','false', null, ['onclick'=>'autocompletardatos(this)'])!!}
                  {!! Form::label('autocomplete','Auto completar con datos de usuario.')!!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('RFC', 'RFC:') !!}
                    {!! Form::text('RFC', null, ['class' => 'form-control','onchange'=>'validarRFC(this)', 'required', 'maxlength'=>'13']) !!}
                    <pre id="resultado"></pre>
                </div>

                <!-- Razon Social Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('razonsocial', 'Razón Social:') !!}
                    {!! Form::text('razonsocial', null, ['class' => 'form-control', 'required', 'maxlength'=>'120']) !!}
                </div>
                <!-- Calle Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('calle', 'Calle:') !!}
                    {!! Form::text('calle', null, ['class' => 'form-control', 'required', 'maxlength'=>'120']) !!}
                </div>

                <!-- Numeroext Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('numeroExt', 'Numero Exterior:') !!}
                    {!! Form::text('numeroExt', null, ['class' => 'form-control', 'maxlength'=>'5', 'required']) !!}
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
                    {!! Form::text('colonia', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Codpostal Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('codpostal', 'Código postal:') !!}
                    {!! Form::text('codpostal', null, ['class' => 'form-control', 'required']) !!}
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

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="subdatfiscales" disabled>Agregar Datos Fiscales</button>
          </div>
          {!! Form::close() !!}
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
    @push('scripts')
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

    function autocompletardatos(checked)
    {
      var habilitado = checked.checked;
      if (habilitado) {
        var RFC = document.getElementById('clientRFC').innerText;
        var razonSocial = document.getElementById('nombreClient').innerText;
        //alert('RFC del Cliente '+ RFC + habilitado);
        document.getElementById('RFC').value = RFC;
        document.getElementById('razonsocial').value = razonSocial.toUpperCase();

        validarRFC(document.getElementById('RFC'));
      }
      if (!habilitado) {
        document.getElementById('RFC').value = '';
        document.getElementById('razonsocial').value = '';
      }


    }
    </script>
    @endpush

    @endcan
