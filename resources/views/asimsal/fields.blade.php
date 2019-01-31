@section('css')
<link href="{{asset('adminlte/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre/Razon:*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'oninput'=>'this.value = this.value.toUpperCase()']) !!}
</div>

<!-- Nombre Comercial Field -->
<div class="form-group">
    {!! Form::label('nomcomercial', 'Nombre Comercial:*') !!}
    {!! Form::text('nomcomercial', null, ['class' => 'form-control', 'required', 'oninput'=>'this.value = this.value.toUpperCase()']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:*') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13', 'required', 'oninput'=>'this.value = this.value.toUpperCase()', 'onchange'=>'validarRFC(this)']) !!}
    <pre id="resultado"></pre>
</div>
<!-- Persona Fisica Field -->
<div class="form-group">
    {!! Form::hidden('persfisica', false) !!}
    {!! Form::checkbox('persfisica', '1', 1, ['onclick'=>'curpenable(this)']) !!}
    {!! Form::label('persfisica', 'Persona Fisica') !!}
</div>

<!-- Curp Field -->
<div class="form-group" id="curpfield">
    {!! Form::label('CURP', 'CURP:') !!}
    {!! Form::text('CURP', null, ['class' => 'form-control', 'maxlength'=>'18', 'onchange'=>'validarInput(this)', 'oninput'=>'this.value = this.value.toUpperCase()']) !!}
    <!-- <pre id="resultado"></pre> -->
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:*') !!}
    {!! Form::text('correo', null, ['class' => 'form-control', 'maxlength'=>'120', 'required']) !!}
</div>
<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>
<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>
<!-- Giro de la Empresa Field -->
<div class="form-group">
    {!! Form::label('giroempresa', 'Giro Empresa:') !!}
    {!! Form::select('giroempresa', $giro, null, ['class' => 'form-control select2']) !!}
</div>

<p><strong>*</strong> Datos Requeridos.</p>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'id'=>'GuardarD']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
//Función para validar una CURP
function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
    	return false;

    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }

    if (validado[2] != digitoVerificador(validado[1]))
    	return false;

    return true; //Validado
}


//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase(),
        resultado = document.getElementById("resultado"),
        valido = "No válido";

    if (curpValida(curp)) { // ⬅️ Acá se comprueba
    	valido = "Válido";
        resultado.classList.add("ok");
    } else {
    	resultado.classList.remove("ok");
    }

    resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
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
      document.getElementById("GuardarD").removeAttribute("disabled");
    } else {
      valido = "No válido"
      resultado.classList.remove("ok");
      document.getElementById("GuardarD").disabled=true;
    }

    resultado.innerText = "RFC: " + rfc
                        + "\nFormato: " + valido;
}

function curpenable(cheked) {
     curpfield = document.getElementById('curpfield');
     //var checkfield = document.getElementById("persfisica").checked;
     var checkfield = cheked.checked;
    //console.log(checkfield);
  if (checkfield == true){
    curpfield.style.display ='block';
    document.getElementById("CURP").required = true;
  }
  else
  {
    curpfield.style.display = 'none';
    document.getElementById("CURP").required = false;
  }

}
</script>
@endsection