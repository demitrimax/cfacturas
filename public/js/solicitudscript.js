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
$('#unidadmedidasat').on('change keyup paste', function(e) {
  console.log(e);
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
      if (palabra.length >= 2  ) {
        $.get('/GetUmedida?word='+palabra, function(data) {
          //exito al obtener los datos
          //console.log(data);
          $('#listunidad').empty();
           $.each(data, function(index, palabras) {
            $('#listunidad').append('<option value ="' + palabras.nombre + '">');
            nombre = palabras.nombre;
          });
          $('#unidadmedida').val(nombre);
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

    $('#quitarconcepto').click(function() {
      console.log("prueba");
    })

    //CALCULAR SUBTOTAL, IVA Y TOTAL
    $('#montoconcepto').on('change keyup paste', function(e) {
      CalcularTotales(e);
    });

function CalcularTotales(e)
{
  var subtotal = numeral(e.target.value);
  $('#csubtotal').val(subtotal.format('0,0.00'));
  var civa = numeral(parseFloat(subtotal.value() * 0.16));
  $('#civa').val(civa.format('0,0.00'));
  var total = numeral(subtotal.value()+civa.value());
  console.log(total);
  $('#cTotal').val(total.format('0,0.00'));
}

    //calcular el IVA del monto ingresado en subtotal
    $('#subtotal').on('change', function(e) {
      var subtotal = e.target.value;
      var civa = parseFloat(subtotal * 1.16);
      $('#civa').val(civa);
    });

var IdRow = 0;

$('#btnagregarotro').click(function() {
  //$(this).removeClass("btn-warning");
    IdRow = IdRow+1;
    var newRow =
    '<tr id="r'+IdRow+'">'+
      '<td style="width:10%">'+
        '<div class="input-group">'+
         '<input type="text" class="form-control" id="unidadmedidasat" name="unidadmedidasat" placeholder="U. de Medida SAT" required title="Clave de la Unidad de Medida del SAT" list="listumedida">'+
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
    '<td style="width:10%">'+
      '<div class="input-group">'+
       '<input type="text" class="form-control" id="unidadmedida" name="unidadmedida" placeholder="U. medida" required title="Unidad de Medida" list="listunidad">'+
       '<datalist id="listunidad">'+
       '</datalist>'+
     '</div>'+
    '</td>'+
    '<td style="width:20%">'+
      '<div class="input-group">'+
        '<select id="ajax-select" class="selectpicker with-ajax" data-live-search="true"></select>'+
      '</div>'+
    '</td>'+
    '<td style="width:30%">'+
      '<div class="input-group col-md-12">'+
         '<input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción detallada" title="Descripción detallada del producto o servicio" required>'+
      '</div>'+
    '</td>'+
    '<td style="width:20%">'+
      '<div class="input-group">'+
        '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
        '<input type="number" min="1" class="form-control" id="monto" name="monto" placeholder="monto" required>'+
        '<span class="input-group-btn">'+
          '<button type="button" class="btn btn-danger btn" id="quitarconcepto"><i class="fa fa-times"></i></button>'+
        '</span>'+
      '</div>'+
    '</td>'
  ;
  $(newRow).appendTo($('#conceptos tbody'))
}) ;



//FUNCION SUMAR LOS PRECIOS
function sumarTotalPrecios() {

}
