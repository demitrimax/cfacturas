
<div id="conceptostable">
  <div class="panel panel-primary">
      <div class="panel-heading">Detalle de la Solicitud</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <table class="table tablaconceptos" id="conceptos">
          <thead>
            <tr>
              <th>U.Medida</th>
              <th>Unidad</th>
              <th>Clave Prod.</th>
              <th>Descripcion</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width:10%">
                <div class="input-group">
                 <input type="text" class="form-control" id="unidadmedidasat" name="unidadmedidasat" placeholder="U. de Medida SAT" required title="Clave de la Unidad de Medida del SAT" list="listumedida">
                 <datalist id="listumedida">
                    <option value='H87'>
                    <option value='EA'>
                    <option value='E48'>
                    <option value='ACT'>
                    <option value='KGM'>
                    <option value='E51'>
                    <option value='A9'>
                    <option value='MTR'>
                    <option value='AB'>
                    <option value='BB'>
                    <option value='KT'>
                    <option value='SET'>
                    <option value='LTR'>
                    <option value='XBX'>
                    <option value='MON'>
                    <option value='HUR'>
                    <option value='MTK'>
                    <option value='11'>
                    <option value='MGM'>
                    <option value='XPK'>
                    <option value='XKI'>
                    <option value='AS'>
                    <option value='GRM'>
                    <option value='PR'>
                    <option value='DPC'>
                    <option value='xun'>
                    <option value='DAY'>
                    <option value='XLT'>
                    <option value='10'>
                    <option value='MLT'>
                    <option value='E54'>
                 </datalist>
              </div>
            </td>
            <td style="width:10%">
              <div class="input-group">
               <input type="text" class="form-control" id="unidadmedida" name="unidadmedida" placeholder="U. medida" required title="Unidad de Medida" list="listunidad">
               <datalist id="listunidad">
               </datalist>
             </div>
            </td>
            <td style="width:20%">
              <div class="input-group">
                 <select class="form-control" style="width:100%" id="claveprodsat"></select>
              </div>
            </td>
            <td style="width:30%">
              <div class="input-group col-md-12">
                 <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción detallada" title="Descripción detallada del producto o servicio" required>
              </div>
            </td>
            <td style="width:20%">
              <div class="input-group">
                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                <input type="number" min="1" class="form-control" id="monto" name="monto" placeholder="monto" required>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-danger btn" id="bnteliminarotro"><i class="fa fa-times"></i></button>
                  <button type="button" class="btn btn-warning btn" id ="btnagregarotro"><i class="fa fa-plus"></i></button>
                </span>
              </div>
            </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      <div class="row">
        <div class="col-xs-4 pull-right">
             <table class="table">

               <tbody>
                 <tr>
                   <td style="width: 50%" class="pull-right">
                    <b>SUBTOTAL:</b>
                   </td>
                    <td style="width: 50%">
                     <div class="input-group">
                       <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                       <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td style="width: 50%" class="pull-right">
                     <b>IVA:</b>
                   </td>
                   <td>
                     <div class="input-group">
                     <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                     <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                   </div>
                   </td>
                 </tr>
                 <tr>
                   <td style="width: 50%" class="pull-right">
                     <b>TOTAL</b>
                   </td>
                   <td style="width: 50%">
                     <div class="input-group">
                     <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                     <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                   </div>
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>
         </div>
       </div>

        <!-- end Nuevo concepto grupo-->
      </div>
    </div>

@push('scripts')
<script>
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

  $('#claveprodsat').select2({
      placeholder: "Seleccione uno...",
      minimumInputLength: 2,
      ajax: {
          url: '{{url('/GetClaveps')}}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term)
              };
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
      }
  });

$('#btnagregarotro').click(function() {
  $(this).removeClass("btn-warning");

    var newRow =
    '<tr>'+
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
         '<select class="form-control" style="width:100%" id="claveprodsat"></select>'+
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
          '<button type="button" class="btn btn-warning btn" id ="btnagregarotro"><i class="fa fa-plus"></i></button>'+
        '</span>'+
      '</div>'+
    '</td>'
  ;
  $(newRow).appendTo($('#conceptos tbody'))
}) ;

$('#quitarconcepto').click(function() {
  console.log("pruea");
});


</script>
@endpush
