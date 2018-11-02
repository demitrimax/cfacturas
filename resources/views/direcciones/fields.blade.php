@section('css')
<style>
#resultado {
  background-color: red;
  color: white;
  font-weight: bold;
}
#resultado.ok {
  background-color: green;
}
</style>
@endsection
<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
</div>

<!-- RFC Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RFC', 'RFC:') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'oninput'=>'validarRFC(this)']) !!}
    <pre id="resultado"></pre>
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razonsocial', 'Razón Social:') !!}
    {!! Form::text('razonsocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
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
    {!! Form::select('estado_id',  $estados, null, ['class' => 'form-control']) !!}
</div>
<!-- Municipio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio_id', 'Municipio:') !!}
    {!! Form::select('municipio_id',  $municipios, null, ['class' => 'form-control']) !!}
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
    {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('direcciones.index') !!}" class="btn btn-default">Cancelar</a>
</div>

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
    } else {
    	valido = "No válido"
    	resultado.classList.remove("ok");
    }

    resultado.innerText = "RFC: " + rfc
                        + "\nResultado: " + rfcCorrecto
                        + "\nFormato: " + valido;
}

</script>
@endsection
