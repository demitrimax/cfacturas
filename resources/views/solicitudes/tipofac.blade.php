
<div id="conceptostable">
  <div class="panel panel-primary">
      <div class="panel-heading">Detalle de la Solicitud</div>
    <div class="panel-body">

  <div class="container-fluid">
  <div class="form-group row">
          <!-- Clave Unidad de Medida -->
          <div class="col-xs-2">
            <div class="input-group">
              {{-- Form::text('numedida', null, ['class'=>'form-control', 'list'=>'listumedida', 'placeholder'=>'Unidad de Medida SAT']) --}}
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
          </div>

          <!-- Unidad de Medida -->
          <div class="col-xs-2">
            <div class="input-group">
             <input type="text" class="form-control" id="unidadmedida" name="unidadmedida" placeholder="U. medida" required title="Unidad de Medida" list="listunidad">
             <datalist id="listunidad">
             </datalist>
           </div>
          </div>
          <!-- Clave de producto SAT -->
          <div class="col-xs-2">
          <div class="input-group">
             <select class="form-control select2" id="claveprodsat"></select>
          </div>
        </div>

          <!-- Descripcion detallada del producto o servicio -->
          <div class="col-xs-3">
          <div class="input-group">
             <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción detallada" title="Descripción detallada del producto o servicio" required>
          </div>
          </div>

          <!-- Precio del producto -->
          <div class="col-xs-3" style="padding-left:0px">
            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
              <input type="number" min="1" class="form-control" id="monto" name="monto" placeholder="monto" required>
              <span class="input-group-btn">
                <button type="button" class="btn btn-danger btn"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-warning btn"><i class="fa fa-plus"></i></button>
              </span>
            </div>
          </div>

        </div>
      </div>
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
  ajax: {
    delay: 250, // wait 250 milliseconds before triggering the request
    url: '{{url('/GetClaveps')}}',
    data: function (params) {
      var query = {
        clave: params.term,
        type: 'public'
      }

      // Query parameters will be ?search=[term]&type=public
      return query;
    }
  }
});

</script>
@endpush
