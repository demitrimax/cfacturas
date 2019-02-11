//checkbox requiere solicitud interempresas
function reqconcepto(cheked) {
     rconcepto = document.getElementById('conceptostable');
     var checkfield = cheked.checked;
    console.log(checkfield);
  if (checkfield == true){
    rconcepto.style.display ='block';
    document.getElementById("concepto").value = "SOLICITUD INTEREMPRESAS";
    $('#cantidad').prop('required',true);
    $('#unidadmedidasat').prop('required',true);
    $('#cantidad').prop('required',true);
    $('#claveprod').prop('required',true);
    $('#descripcion').prop('required',true);
    $('#montoconcepto').prop('required',true);
    $('#csubtotal').prop('required',true);
    $('#civa').prop('required',true);
    $('#Total').prop('required',true);
  }
  else
  {
    rconcepto.style.display = 'none';

    $('#cantidad').prop('required',false);
    $('#unidadmedidasat').prop('required',false);
    $('#cantidad').prop('required',false);
    $('#claveprod').prop('required',false);
    $('#descripcion').prop('required',false);
    $('#montoconcepto').prop('required',false);
    $('#csubtotal').prop('required',false);
    $('#civa').prop('required',false);
    $('#Total').prop('required',false);
  }

}
// Init a timeout variable to be used below
var timeout = null;
// Listen for keystroke events
$('.FormSolicitud').on('change keyup paste', 'input.UnidadMedidaSAT', function(e) {
  //console.log(e);
  var palabra = e.target.value;
  var nombre;
  var UMedida =  $(this).parent().parent().parent().children('.ColUMedida').children('.UMedida').children('.ListaUnidad');
  // Clear the timeout if it has already been set.
  // This will prevent the previous task from executing
  // if it has been less than <MILLISECONDS>
  clearTimeout(timeout);
      // Make a new timeout set to go off in 800ms
  timeout = setTimeout(function () {
      //console.log('Input Value:', palabra);
      //ajax
      if (palabra.length >= 2  ) {
        $.get('/GetUmedida?word='+palabra, function(data) {
          //exito al obtener los datos
          //console.log(data);
          UMedida.empty();
           $.each(data, function(index, palabras) {
            UMedida.append('<option value ="' + palabras.nombre + '">');
            nombre = palabras.nombre;
            console.log(nombre);
          });
          UMedida.parent().children('.UnidadMedida').val(nombre);
        });
      }
  }, 500);
  });

  $('#claveprodsat').on('change keyup paste', function(e) {
    //console.log(e);
    var palabra = e.target.value;
    var nombre;
    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout);
        // Make a new timeout set to go off in 800ms
    timeout = setTimeout(function () {
        console.log('Input Value:', palabra);
        //ajax
        if (palabra.length >= 4  ) {
          $.get('/GetClaveps?q='+palabra, function(data) {
            //exito al obtener los datos
            console.log(data);
            $('#listcod').empty();
             $.each(data, function(index, palabras) {
              $('#listcod').append('<option value ="' + palabras.id + '">');

            });

          });
        }
    }, 500);
    });
    //ACCION DEL BOTON DE ELIMINAR LINEA DE CONCEPTO
    $('.FormSolicitud').on('click', 'button.QuitarConcepto', function() {
      console.log("prueba");
      $(this).parent().parent().parent().parent().remove();
      SumarTodosLosMontos();
      CalcularTotales();
    })

    //CALCULAR LA CANTIDAD POR EL PRECIO DEL PRODUCTO
    $('.FormSolicitud').on('change', 'input.NCantidadProducto', function() {
      var PUnitario = $(this).parent().parent().parent().children(".ColIngImporte").children(".IngresoImporte").children(".PreUnitario");
      var Subtotal = $(this).parent().parent().parent().children(".ColNMonto").children(".NSubtotalProducto").children(".NMontoProducto");
     
      var precioFinal = Number($(this).val()) * Number(PUnitario.val());
      //console.log(precioFinal);
      Subtotal.val(precioFinal);
      CalcularTotales();
      SumarTodosLosMontos();
    })


    //CALCULAR SUBTOTAL, IVA Y TOTAL
    $('.FormSolicitud').on('change', 'input.PreUnitario', function() {
      var Cantidad = $(this).parent().parent().parent().children(".NCantidadProd").children(".NCantProd").children(".NCantidadProducto");
      var Subtotal = $(this).parent().parent().parent().children(".ColNMonto").children(".NSubtotalProducto").children(".NMontoProducto");
       var precioFinal = Number($(this).val()) * Number(Cantidad.val());
       Subtotal.val(precioFinal);
       SumarTodosLosMontos();
     
      CalcularTotales();
    });

    //SUMAR TODOS LOS PRECIOS
    function SumarTodosLosMontos() {
      var ItemMonto = $('.NMontoProducto');
      var ArraySumaMonto = [];
      //console.log(ItemMonto.length);
      for (var i=0; i < ItemMonto.length; i++  )
      {
            ArraySumaMonto.push(Number($(ItemMonto[i]).val()));
            //console.log($(ItemMonto[i]).val());
      } 
      //console.log('ArraySumaMonto',ArraySumaMonto);
      function sumaArrayMontos(total, numero)
      {
        return total + numero;
      }
        var SumaTotalMonto = ArraySumaMonto.reduce(sumaArrayMontos);
        //console.log('SumaTotalMonto',SumaTotalMonto);
        SumaTotalMonto = numeral(SumaTotalMonto);
        $("#csubtotal").val(SumaTotalMonto.format('0,0.00'));
    }


function CalcularTotales()
{
  var Ssubtotal = numeral($("#csubtotal").val());
  var civa = numeral(parseFloat(Ssubtotal.value() * 0.16));
  $('#civa').val(civa.format('0,0.00'));
  var total = numeral(Ssubtotal.value()+civa.value());
  //console.log(total);
  $('#cTotal').val(total.format('0,0.00'));
}

    //calcular el IVA del monto ingresado en subtotal
    $('#subtotal').on('change', function(e) {
      var subtotal = e.target.value;
      var civa = parseFloat(subtotal * 1.16);
      $('#civa').val(civa);
    });

//AGREGA OTRA LINEA DE PRODUCTOS //PARTE INTEREMPRESAS
var IdRow = 0;
$('#btnagregarotro').click(function() {
  //$(this).removeClass("btn-warning");
    IdRow = IdRow+1;
    var newRow =
    '<tr id="r'+IdRow+'">'+
        '<td class="NCantidadProd">'+
          '<div class="input-group NCantProd">'+
            '<input type="number" class="form-control NCantidadProducto" id="cantidad['+IdRow+']" name="cantidad['+IdRow+']" placeholder="Cantidad" title="Cantidad" min="1" required value=1>'+
          '</div>'+
        '</td>'+
      '<td>'+
        '<div class="input-group">'+
         '<input type="text" class="form-control UnidadMedidaSAT" id="unidadmedidasat['+IdRow+']" name="unidadmedidasat['+IdRow+']" placeholder="U. de Medida SAT" required title="Clave de la Unidad de Medida del SAT" list="listumedida">'+
         '<datalist id="listumedida">'+
            '<option value="H87">'+
            '<option value="EA">'+
            '<option value="E48">'+
            '<option value="ACT">'+
            '<option value="KGM">'+
            '<option value="E51">'+
            '<option value="A9">'+
            '<option value="MTR">'+
            '<option value="AB">'+
            '<option value="BB">'+
            '<option value="KT">'+
            '<option value="SET">'+
            '<option value="LTR">'+
            '<option value="XBX">'+
            '<option value="MON">'+
            '<option value="HUR">'+
            '<option value="MTK">'+
            '<option value="11">'+
            '<option value="MGM">'+
            '<option value="XPK">'+
            '<option value="XKI">'+
            '<option value="AS">'+
            '<option value="GRM">'+
            '<option value="PR">'+
            '<option value="DPC">'+
            '<option value="xun">'+
            '<option value="DAY">'+
            '<option value="XLT">'+
            '<option value="10">'+
            '<option value="MLT">'+
            '<option value="E54">'+
         '</datalist>'+
      '</div>'+
    '</td>'+
    '<td class="ColUMedida">'+
      '<div class="input-group UMedida">'+
       '<input type="text" class="form-control UnidadMedida" id="unidadmedida['+IdRow+']" name="unidadmedida['+IdRow+']" placeholder="U. medida" required title="Unidad de Medida" list="listunidad">'+
       '<datalist id="listunidad" class="ListaUnidad">'+
       '</datalist>'+
     '</div>'+
    '</td>'+
    '<td>'+
      '<div class="input-group">'+
        '<select id="ajax-select'+IdRow+'" class="selectpicker'+IdRow+' with-ajax" data-live-search="true" id="claveprod['+IdRow+']" name="claveprod['+IdRow+']"></select>'+
      '</div>'+
    '</td>'+
    '<td>'+
      '<div class="input-group col-md-12">'+
         '<input type="text" class="form-control" id="descripcion['+IdRow+']" name="descripcion['+IdRow+']"  placeholder="Descripción detallada" title="Descripción detallada del producto o servicio" required>'+
      '</div>'+
    '</td>'+
    '<td class="ColIngImporte">'+
    '<div class="input-group IngresoImporte">'+
      '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
      '<input type="number" min="1" class="form-control PreUnitario" id="importecon['+IdRow+']" name="importecon['+IdRow+']" placeholder="Importe">'+
      '</div>'+
    '</td>'+
    '<td class="ColNMonto">'+
      '<div class="input-group NSubtotalProducto">'+
        '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
        '<input type="number" min="1" class="form-control NMontoProducto" id="montoconcepto['+IdRow+']" name="montoconcepto['+IdRow+']" placeholder="monto" required readonly>'+
        '<span class="input-group-btn">'+
          '<button type="button" class="btn btn-danger btn QuitarConcepto" id="quitarconcepto"><i class="fa fa-times"></i></button>'+
        '</span>'+
      '</div>'+
    '</td>'
  ;
  $(newRow).appendTo($('#conceptos tbody'))
  $('body').append('<script> $(".selectpicker'+IdRow+'").selectpicker().filter(".with-ajax").ajaxSelectPicker(options); </script>')
}) ;

