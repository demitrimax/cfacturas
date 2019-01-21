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
    {!! Form::date('fechasolicitud0', date("Y-m-d"), ['class' => 'form-control', 'required', 'disabled']) !!}
    {!! Form::hidden('fechasolicitud', date("Y-m-d")) !!}
</div>

<!-- Sociocomer Id Field -->
<div class="form-group">
    {!! Form::label('sociocomer_id', 'Socio Comercial:') !!}
    {!! Form::select('sociocomer_id', $sociocomer, null, ['class' => 'form-control select2', 'style'=>'width: 100%;','placeholder'=>'Seleccione uno']) !!}
</div>

<!-- Sociocomer Id Field -->
<div class="form-group">
    {!! Form::label('asoc_comision', 'Comisión Socio:') !!}
    {!! Form::number('asoc_comision', null, ['class' => 'form-control', 'step'=>'0.01', 'max' => '15.00', 'placeholder'=>'Porcentaje comisionable']) !!}
</div>

<!-- Cliente Id Field -->
<div class="form-group">
    {!! Form::label('cliente_id', 'Cliente:*') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control select2', 'style'=>'width: 100%;', 'required', 'placeholder'=>'Seleccione uno']) !!}
</div>

<!-- Cuenta Id Field -->
<div class="form-group">
    {!! Form::label('cuenta_id', 'Cuenta asociada:*') !!}
    {!! Form::select('cuenta_id', [''=>'Seleccione una cuenta'], null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Empresas Asociadas al Acuerdo Comercial -->
<div class="form-group">
    {!! Form::label('empresasasoc', 'Empresa(s) Facturadoras(s):*') !!}
    {!! Form::select('empresasasoc[]', $empresas, null, ['class' => 'form-control select2', 'required', 'multiple'=>'multiple', 'data-placeholder'=>'Seleccione una empresa', 'style'=>'width: 100%;']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:*') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Informacion Field -->
<div class="form-group">
    {!! Form::label('informacion', 'Observaciones:') !!}
    {!! Form::text('informacion', null, ['class' => 'form-control', 'maxlength' =>'150']) !!}
</div>

<!-- Ac Principalporc Field -->
<div class="form-group">
    {!! Form::label('ac_principalporc', 'Porcentaje Principal:*') !!}
    {!! Form::number('ac_principalporc', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'max' => '15.00', 'min'=>'0.09']) !!}
</div>

<!-- Ac Secundarioporc Field -->
<div class="form-group">
    {!! Form::label('ac_secundarioporc', 'Porcentaje Secundario:') !!}
    {!! Form::number('ac_secundarioporc', null, ['class' => 'form-control', 'step'=>'0.01', 'max' => '15.00', 'min'=>'0.09']) !!}
</div>

<!-- Elab User Id Field -->
<div class="form-group">
    {!! Form::label('elab_user_id0', 'Usuario que Elabora:*') !!}
    {!! Form::select('elab_user_id0', $usuarios, Auth::user()->id, ['class' => 'form-control', 'readonly','required']) !!}
    {!! Form::hidden('elab_user_id', Auth::user()->id) !!}
</div>
@can('accomerciales-authorized')
<!-- Aut User Id Field -->
<div class="form-group">
    {!! Form::label('aut_user_id', 'Usuario que Supervisa:') !!}
    {!! Form::select('aut_user_id', $usuarios, null, ['class' => 'form-control', 'required']) !!}
</div>
@endcan
@can('accomerciales-supervised')
<!-- Aut User2 Id Field -->
<div class="form-group">
    {!! Form::label('aut_user2_id', 'Usuario que Autoriza:') !!}
    {!! Form::select('aut_user2_id', $usuarios,null, ['class' => 'form-control', 'required']) !!}
</div>
@endcan

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accomercials.index') !!}" class="btn btn-default">Cancelar</a>
</div>
