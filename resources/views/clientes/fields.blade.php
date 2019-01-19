<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre/Razon:*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nombre Comercial Field -->
<div class="form-group">
    {!! Form::label('nomcomercial', 'Nombre Comercial:') !!}
    {!! Form::text('nomcomercial', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:*') !!}
    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13', 'required']) !!}
</div>
<!-- Persona Fisica Field -->
<div class="form-group">
    {!! Form::checkbox('persfisica', 'false', null, ['onclick'=>'curpenable(this)']) !!}
    {!! Form::label('persfisica', 'Persona Fisica') !!}
</div>

<!-- Curp Field -->
<div class="form-group" style="display:none;" id="curpfield">
    {!! Form::label('CURP', 'CURP:') !!}
    {!! Form::text('CURP', null, ['class' => 'form-control', 'maxlength'=>'18', 'onchange'=>'validarInput(this)']) !!}
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
<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>
<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('giroempresa', 'Giro Empresa:') !!}
    {!! Form::text('giroempresa', null, ['class' => 'form-control']) !!}
</div>

<p><strong>*</strong> Datos Requeridos.</p>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script>
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
