@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection

<div class="col-md-6">
  <div class="box box-primary">
      <div class="box-body">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Datos Generales</h3>
              </div>
              <div class="panel-body">
                <!-- Rfc Field -->
                <div class="form-group">
                    {!! Form::label('rfc', 'RFC:*') !!}
                    {!! Form::text('rfc', null, ['class' => 'form-control', 'maxlength'=>'13', 'required', 'oninput'=>'this.value = this.value.toUpperCase()', 'onchange'=>'validarRFC(this)']) !!}
                    <div id="resultado" class="callout">
                    </div>
                    <!-- Nombre Field -->
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre de la Empresa:*') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'length'=>'150', 'placeholder'=>'Nombre/Razón Social', 'required']) !!}
                    </div>


                  <!-- Apodrado Legal Field -->
                  <div class="form-group">
                      {!! Form::label('apoderadolegal', 'Apoderado Legal:') !!}
                      {!! Form::text('apoderadolegal', null, ['class' => 'form-control', 'length'=>'120', 'placeholder'=>'Apoderado Legal']) !!}
                  </div>

                  <!-- Giro de la Empresa Field -->
                  <div class="form-group">
                      {!! Form::label('giroempresa', 'Giro Empresa:*') !!}
                      {!! Form::text('giroempresa',  null, ['class' => 'form-control', 'list'=>'giros', 'required']) !!}
                      <datalist id="giros">
                      </datalist>
                  </div>

                  <!-- Comision Field -->
                  <div class="input-group">
                      <span class="input-group-addon">Porcentaje de Comisión</span>
                      {!! Form::number('comision', null, ['class' => 'form-control', 'step'=>'0.01','min'=>'0', 'placeholder'=>'Porcentaje de Comision']) !!}
                      <span class="input-group-addon">%</span>
                  </div>

                </div>
              </div>
            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Datos de Contacto</h3>
              </div>
              <div class="panel-body">

                <!-- Telefono Field -->
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono:') !!}
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Correo Factura Field -->
                <div class="form-group">
                    {!! Form::label('correo_factura', 'Correo de Facturas:') !!}
                    {!! Form::email('correo_factura', null, ['class' => 'form-control', 'placeholder'=>'correo@factuas.com']) !!}
                </div>

                <!-- Correo Notifica Field -->
                <div class="form-group">
                    {!! Form::label('correo_notifica', 'Correo de Notificaciones:*') !!}
                    {!! Form::email('correo_notifica', null, ['class' => 'form-control', 'placeholder'=>'correo@notificaciones.com', 'required']) !!}
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Datos de Dirección</h3>
                </div>
                <div class="panel-body">
                    <!-- Direccion Field -->
                    <div class="form-group">
                        {!! Form::label('calle', 'Calle:') !!}
                        {!! Form::text('calle', $direcciones->calle, ['class' => 'form-control', 'placeholder'=>'Calle']) !!}
                    </div>
                    <div class="row">
                        <!-- Numeroext Field -->
                        <div class="form-group col-xs-6">
                            {!! Form::label('numeroExt', 'Numero Exterior:') !!}
                            {!! Form::text('numeroExt', $direcciones->numeroExt, ['class' => 'form-control', 'maxlength'=>'5', 'placeholder'=>'Núm Exterior']) !!}
                        </div>

                        <!-- Numeroint Field -->
                        <div class="form-group col-xs-6">
                            {!! Form::label('numeroInt', 'Numero Interior:') !!}
                            {!! Form::text('numeroInt', $direcciones->numeroInt, ['class' => 'form-control', 'maxlength'=>'5', 'placeholder'=>'Núm Interior']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <!-- Codpostal Field -->
                        <div class="form-group col-xs-6">
                            {!! Form::label('codpostal', 'Código postal:') !!}
                            {!! Form::text('codpostal', $direcciones->codpostal, ['class' => 'form-control', 'placeholder'=>'Código Postal']) !!}
                        </div>
                        <!-- Codpostal Field -->
                        <div class="form-group col-xs-6">
                            {!! Form::label('ciudad', 'Ciudad:') !!}
                            {!! Form::text('ciudad', $direcciones->ciudad, ['class' => 'form-control', 'list'=>'listaciudad', 'placeholder'=>'ciudad']) !!}
                        </div>
                        <datalist id="listaciudad"></datalist>

                    </div>

                    <!-- Colonia Field -->
                    <div class="form-group">
                        {!! Form::label('colonia', 'Colonia:') !!}
                        {!! Form::text('colonia', $direcciones->colonia, ['class' => 'form-control', 'list'=>'listacolonias', 'placeholder'=>'Colonia']) !!}
                    </div>
                    <datalist id="listacolonias"></datalist>

                    <!-- Estado Id Field -->
                    <div class="form-group">
                        {!! Form::label('estado_id', 'Estado:') !!}
                        {!! Form::select('estado_id',  $estados, $direcciones->estado_id, ['class' => 'form-control', 'placeholder'=>'Seleccione', 'required']) !!}
                    </div>
                    <!-- Municipio Id Field -->
                    <div class="form-group">
                        {!! Form::label('municipio_id', 'Municipio:') !!}
                        {!! Form::select('municipio_id',  $municipios, $direcciones->municipio_id, ['class' => 'form-control', 'placeholder'=>'Seleccione', 'required']) !!}
                    </div>

                    <!-- Referencias Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('referencias', 'Referencias:') !!}
                        {!! Form::textarea('referencias', $direcciones->referencias, ['class' => 'form-control']) !!}
                    </div>


                  </div>
                </div>
            </div>
          </div>
        </div>



<div class="form-group col-sm-12">
  <p><strong>*</strong> Datos Requeridos.</p>
  {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
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
        valido, tipopersona;

    var rfcCorrecto = rfcValido(rfc);   // ⬅️ Acá se comprueba
      tipopersona = '';
    if (rfcCorrecto) {
      valido = "Válido";
      resultado.classList.add("callout-success");
      resultado.classList.remove("callout-danger");
      console.log(rfc.length);
      if (rfc.length > 12) {
        tipopersona = 'Física';
      }
      if (rfc.length <= 12) {
        tipopersona = 'Moral';
      }
      //document.getElementById("GuardarD").removeAttribute("disabled");
    } else {
      valido = "No válido"
      resultado.classList.remove("callout-success");
      resultado.classList.add("callout-danger");
      //document.getElementById("GuardarD").disabled=true;
    }

    resultado.innerText = "RFC: " + rfc
                        + "\nFormato: " + valido +' Tipo de Persona:'+tipopersona;

}
// Init a timeout variable to be used below
var timeout = null;
// Listen for keystroke events
$('#giroempresa').on('change keyup paste', function(e) {
  //console.log(e);
  var palabra = e.target.value;
  // Clear the timeout if it has already been set.
  // This will prevent the previous task from executing
  // if it has been less than <MILLISECONDS>
  clearTimeout(timeout);
      // Make a new timeout set to go off in 800ms
  timeout = setTimeout(function () {
      console.log('Input Value:', palabra);
      //ajax
      if (palabra.length >= 3  ) {
        $.get('/GetGiro?word='+palabra, function(data) {
          //exito al obtener los datos
          // request.readyState === 4
          // request.status = 200 //que los datos esten listos entonces
          //console.log(data);
          $('#giros').empty();
           $.each(data, function(index, palabras) {
            $('#giros').append('<option value ="' + palabras.descripcion + '">');
          });
        });
      }
  }, 500);
});
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

$('#codpostal').on('change', function(e) {
  //console.log(e);
  var codpostal = e.target.value;
  var estadoid;
  var municipioid;
  if (codpostal.length >= 5  ) {
  //ajax
  $.get('/GetCiudades?cp='+codpostal, function(data) {
    //exito al obtener los datos
    //console.log(data);
    $('#listaciudad').empty();
    $.each(data, function(index, ciudad) {
      $('#listaciudad').append('<option value ="' + ciudad.ciudad + '">' );
      estadoid = ciudad.estado_id;
      municipioid = ciudad.municipio_id;
    });
    console.log(estadoid);
    //cambiar el combobox del estado que esta en la variable estado_id
    $('select#estado_id').val(estadoid);
    $('#estado_id').change();
    $('select#municipio_id').val(municipioid);
  });
  $.get('/GetAsentamientos?cp='+codpostal, function(data) {
    //exito al obtener los datos
    console.log(data);
    $('#listacolonias').empty();
    $.each(data, function(index, colonias) {
      $('#listacolonias').append('<option value ="' + colonias.asentamiento + '">' );
    });
  });

}
});
</script>
@endsection
