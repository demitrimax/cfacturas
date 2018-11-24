<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa:') !!}
    <p>{!! $empDatfiscales->catempresa->nombre !!}</p>
</div>

<!-- Razonsocial Field -->
<div class="form-group">
    {!! Form::label('razonsocial', 'Razon Social:') !!}
    <p>{!! $empDatfiscales->razonsocial !!}</p>
</div>

<!-- Rfc Field -->
<div class="form-group">
    {!! Form::label('RFC', 'RFC:') !!}
    <p>{!! $empDatfiscales->RFC !!}</p>
</div>

<!-- Calle Field -->
<div class="form-group">
    {!! Form::label('calle', 'Dirección:') !!}
    <p>{!! $empDatfiscales->calle.' '.$empDatfiscales->numeroExt.' '.$empDatfiscales->numeroInt !!}</p>
</div>

<!-- Estado Id Field -->
<div class="form-group">
    {!! Form::label('estado_id', 'Estado:') !!}
    <p>{!! $empDatfiscales->catestado->nombre !!}</p>
</div>

<!-- Municipio Id Field -->
<div class="form-group">
    {!! Form::label('municipio_id', 'Municipio:') !!}
    <p>{!! $empDatfiscales->catmunicipio->nomMunicipio !!}</p>
</div>

<!-- Colonia Field -->
<div class="form-group">
    {!! Form::label('colonia', 'Colonia:') !!}
    <p>{!! $empDatfiscales->colonia !!}</p>
</div>

<!-- Codpostal Field -->
<div class="form-group">
    {!! Form::label('codpostal', 'Codpostal:') !!}
    <p>{!! $empDatfiscales->codpostal !!}</p>
</div>

<!-- Referencias Field -->
<div class="form-group">
    {!! Form::label('referencias', 'Referencias:') !!}
    <p>{!! $empDatfiscales->referencias !!}</p>
</div>
