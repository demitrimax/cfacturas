<div class="form-group">
  <label class="checkbox-inline">
      {!! Form::hidden('rconcepto', false) !!}
      {!! Form::checkbox('rconcepto', '1', 0, ['onclick'=>'reqconcepto(this)']) !!}
      {!! Form::label('rconcepto', 'Solicitud Inter-Empresas') !!}
  </label>
</div>
<div id="conceptostable" style="display:none;">
  <div class="panel panel-primary">
      <div class="panel-heading">Solicitud InterEmpresas</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <table class="table tablaconceptos" id="conceptos">
          <thead>
            <tr>
              <th style="width:4%">Cantidad</th>
              <th style="width:10%">U.Medida</th>
              <th style="width:10%;">Unidad</th>
              <th style="width:20%;">Clave Prod.</th>
              <th style="width:30%;">Descripcion</th>
              <th style="width:13%;">P. Unitario</th>
              <th style="width:13%;">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td class="NCantidadProd">
                <div class="input-group NCantProd">
                 <input type="number" class="form-control NCantidadProducto" id="cantidad[]" name="cantidad" placeholder="Cantidad" title="Cantidad" min="1" value=1 >
              </div>
            </td>
              <td>
                <div class="input-group">
                 <input type="text" class="form-control UnidadMedidaSAT" id="unidadmedidasat[]" name="unidadmedidasat" placeholder="U. de Medida SAT" title="Clave de la Unidad de Medida del SAT" list="listumedida" maxlength="5">
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
            <td class="ColUMedida">
              <div class="input-group UMedida">
               <input type="text" class="form-control UnidadMedida" id="unidadmedida[]" name="unidadmedida" placeholder="U. medida" title="Unidad de Medida" list="listunidad">
               <datalist id="listunidad" class="ListaUnidad">
               </datalist>
             </div>
            </td>
            <td>
              <div class="input-group">
                  <select id="ajax-select" class="selectpicker with-ajax" data-live-search="true" id="claveprod[]" name="claveprod"></select>
              </div>
              <datalist id="listcod">
              </datalist>
            </td>
            <td>
              <div class="input-group col-md-12">
                 <input type="text" class="form-control" id="descripcion[]" name="descripcion"  placeholder="Descripción detallada" title="Descripción detallada del producto o servicio">
              </div>
            </td>
            <td class="ColIngImporte">
              <div class="input-group IngresoImporte">
                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                <input type="number" min="1" class="form-control PreUnitario" id="importecon[]" name="importecon" placeholder="Importe">
              </div>
            </td>
            <td class="ColNMonto">
              <div class="input-group NSubtotalProducto">
                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                <input type="number" min="1" class="form-control NMontoProducto" id="montoconcepto[]" name="montoconcepto" placeholder="Monto" readonly>
                <span class="input-group-btn">
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
                       <input type="text" min="1" class="form-control" id="csubtotal" name="csubtotal" placeholder="00000" readonly>
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
                     <input type="text" min="1" class="form-control" id="civa" name="civa" placeholder="00000" readonly>
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
                     <input type="text" min="1" class="form-control" id="cTotal" name="cTotal" placeholder="00000" readonly>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{asset('adminlte/bower_components/ajaxautocomplete/dist/js/ajax-bootstrap-select.js')}}"></script>
<script src="{{asset('js/pajaxautocomplete.js') }}"></script>
<script src="{{asset('js/solicitudscript.js')}}"></script>
@endpush
