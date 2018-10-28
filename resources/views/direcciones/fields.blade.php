<!-- Cliente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente Id:') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
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
    {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}
</div>
<!-- Municipio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio_id', 'Municipio:') !!}
    {!! Form::select('municipio_id', ['Seleccione uno'], null, ['class' => 'form-control']) !!}
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
</script>
@endsection
