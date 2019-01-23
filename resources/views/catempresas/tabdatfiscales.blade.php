@can('empdatfiscales-list')
  <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Datos Fiscales</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
      @if($catempresas->emp_datfiscales->count()>0)
        <table class="table table-condensed">
          <tbody><tr>
            <th style="width: 10px">#</th>
            <th>Razon Social</th>
            <th>RFC</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </tr>
        @foreach($catempresas->emp_datfiscales as $key=>$datFiscales)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$datFiscales->razonsocial}}
              {!! ($datFiscales->sucursal==1)? '<button type="button" class="btn bg-navy btn-xs" data-toggle="tooltip" data-placement="top" title="Sucursal"><i class="fa fa-check-square"></i></button>':'' !!}
            </td>
            <td>{{$datFiscales->RFC}}</td>
            <td>{{$datFiscales->calle.' '.$datFiscales->numeroExt}}</td>
            <td>
              {!! Form::open(['route' => ['empDatfiscales.destroy', $datFiscales->id], 'method' => 'delete', 'id'=>'deldatfiscalesform'.$datFiscales->id]) !!}
              <div class='btn-group'>
              @can('empdatfiscales-edit')
              <a href="/empDatfiscales/{{$datFiscales->id}}/edit" type="button" class="btn btn-warning" rel="tooltip" title="Editar"> <i class="fa fa-pencil"></i> </a>
              @endcan
              @can('empdatfiscales-delete')
              {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDeletedatFiscales(".$datFiscales->id.")"]) !!}
                                  {!! Form::hidden('redirect', 'catempresas.show') !!}
                                  {!! Form::hidden('empresa_id', $catempresas->id) !!}
              @endcan
            </div>
            {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
        <h5> No existen datos fiscales registrados.</h5>
      @endif
        <h1 class="pull-right">
          @can('empdatfiscales-create')
           <button type="button" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#modal-datfiscales">Agregar datos fiscales</button>
          @endcan
        </h1>
      </div>
      <!-- /.box-body -->

    </div>
  @endcan

  @can('empdatfiscales-create')
  <div class="modal fade" id="modal-datfiscales">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Datos Fiscales</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'empDatfiscales.store']) !!}
                <!-- Sucursal Field -->
                <div class="input-group">
                  <span class="input-group-addon">
                    {!! Form::checkbox('sucursal', null) !!}
                  </span>
                    {!! Form::label('sucursal', 'Sucursal') !!}
                </div>

                <!-- Empresa Id Field -->
                    {!! Form::hidden('empresa_id', $catempresas->id, ['class' => 'form-control']) !!}
                    {!! Form::hidden('redirect', 'clientes.show') !!}

                <!-- Razonsocial Field -->
                <div class="form-group">
                    {!! Form::label('razonsocial', 'Razon Social:') !!}
                    {!! Form::text('razonsocial', null, ['class' => 'form-control', 'maxlength'=>'120', 'onKeyUp'=>'this.value=this.value.toUpperCase();']) !!}
                </div>

                <!-- Rfc Field -->
                <div class="form-group">
                    {!! Form::label('RFC', 'RFC:') !!}
                    {!! Form::text('RFC', null, ['class' => 'form-control', 'maxlength'=>'13', 'onKeyUp'=>'this.value=this.value.toUpperCase();']) !!}
                </div>

                <!-- Calle Field -->
                <div class="form-group">
                    {!! Form::label('calle', 'Calle:') !!}
                    {!! Form::text('calle', null, ['class' => 'form-control', 'maxlength'=>'191']) !!}
                </div>

                <!-- Numeroext Field -->
                <div class="form-group">
                    {!! Form::label('numeroExt', 'Numero Exterior:') !!}
                    {!! Form::text('numeroExt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                </div>

                <!-- Numeroint Field -->
                <div class="form-group">
                    {!! Form::label('numeroInt', 'Numero Interior:') !!}
                    {!! Form::text('numeroInt', null, ['class' => 'form-control', 'maxlength'=>'5']) !!}
                </div>

                <!-- Estado Id Field -->
                <div class="form-group">
                    {!! Form::label('estado_id', 'Estado Id:') !!}
                    {!! Form::select('estado_id', $estados, null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Municipio Id Field -->
                <div class="form-group">
                    {!! Form::label('municipio_id', 'Municipio Id:') !!}
                    {!! Form::select('municipio_id', ['Seleccione uno'], null, ['class' => 'form-control', 'required']) !!}
                </div>

                <!-- Colonia Field -->
                <div class="form-group">
                    {!! Form::label('colonia', 'Colonia:') !!}
                    {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Codpostal Field -->
                <div class="form-group">
                    {!! Form::label('codpostal', 'Código Postal:') !!}
                    {!! Form::number('codpostal', null, ['class' => 'form-control', 'maxlength'=>'6']) !!}
                </div>

                <!-- Referencias Field -->
                <div class="form-group">
                    {!! Form::label('referencias', 'Referencias:') !!}
                    {!! Form::textarea('referencias', null, ['class' => 'form-control']) !!}
                </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Agregar Datos</button>
            </div>
            {!! Form::close() !!}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
    @endcan
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
function ConfirmDeletedatFiscales(id) {
  swal({
        title: '¿Estás seguro?',
        text: 'Se eliminarán estos datos fiscales.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['deldatfiscalesform'+id].submit();
    }
  })
}
</script>
@endpush
