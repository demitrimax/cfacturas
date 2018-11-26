@can('accomerciales-authorized')
<!-- Autorizado Field -->
<div class="form-group">
    <label class="checkbox-inline">
        {!! Form::hidden('autorizado', false) !!}
        {!! Form::checkbox('autorizado', '1', null, ['class'=>'flat-red']) !!} {!! Form::label('autorizado', 'Autorizado') !!}
    </label>
</div>
@endcan

<!-- Fechasolicitud Field -->
<div class="form-group">
    {!! Form::label('fechasolicitud', 'Fecha de Solicitud:*') !!}
    {!! Form::date('fechasolicitud', date("Y-m-d"), ['class' => 'form-control', 'required', 'disabled']) !!}
</div>

<!-- Sociocomer Id Field -->
<div class="form-group">
    {!! Form::label('sociocomer_id', 'Socio Comercial:*') !!}
    {!! Form::select('sociocomer_id', $sociocomer ,null, ['class' => 'form-control select2', 'style'=>'width: 100%;', 'required','placeholder'=>'Seleccione uno', 'onchange' =>'sociocomercialremove(selectedIndex)']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente:*') !!}
    {!! Form::select('cliente_id', $cliente, null, ['class' => 'form-control select2', 'style'=>'width: 100%;', 'required', 'placeholder'=>'Seleccione uno']) !!}
</div>

<!-- Direccion Id Field -->
<div class="form-group">
    {!! Form::label('direccion_id', 'Datos Fiscales:*') !!}
    {!! Form::select('direccion_id', [''=>'Seleccione un cliente'],null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Cuenta Id Field -->
<div class="form-group">
    {!! Form::label('cuenta_id', 'Cuenta asociada:*') !!}
    {!! Form::select('cuenta_id', [''=>'Seleccione un cliente'], null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Empresas Asociadas al Acuerdo Comercial -->
<div class="form-group">
    {!! Form::label('empresasasoc', 'Empresa(s) Asociada(s):*') !!}
    {!! Form::select('empresasasoc', $empresas, null, ['class' => 'form-control select2', 'required', 'multiple'=>'multiple', 'data-placeholder'=>'Seleccione una empresa', 'style'=>'width: 100%;']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:*') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Informacion Field -->
<div class="form-group">
    {!! Form::label('informacion', 'Informacion:') !!}
    {!! Form::text('informacion', null, ['class' => 'form-control', 'maxlength' =>'150']) !!}
</div>

<!-- Ac Principalporc Field -->
<div class="form-group">
    {!! Form::label('ac_principalporc', 'Porcentaje Principal:') !!}
    {!! Form::number('ac_principalporc', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'max' => '6.99', 'min'=>'0.09']) !!}
</div>

<!-- Ac Secundarioporc Field -->
<div class="form-group">
    {!! Form::label('ac_secundarioporc', 'Porcentaje Secundario:') !!}
    {!! Form::number('ac_secundarioporc', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'max' => '6.99', 'min'=>'0.09']) !!}
</div>



<!-- Elab User Id Field -->
<div class="form-group">
    {!! Form::label('elab_user_id', 'Usuario que Elabora:') !!}
    {!! Form::text('elab_user_id', Auth::user()->nombre, ['class' => 'form-control', 'disabled','required']) !!}
</div>
@can('accomerciales-authorized')
<!-- Aut User Id Field -->
<div class="form-group">
    {!! Form::label('aut_user_id', 'Usuario Supervisa:') !!}
    {!! Form::number('aut_user_id', null, ['class' => 'form-control', 'required']) !!}
</div>
@endcan
@can('accomerciales-supervised')
<!-- Aut User2 Id Field -->
<div class="form-group">
    {!! Form::label('aut_user2_id', 'Usuario Autoriza:') !!}
    {!! Form::number('aut_user2_id', null, ['class' => 'form-control']) !!}
</div>
@endcan

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accomercials.index') !!}" class="btn btn-default">Cancel</a>
</div>
