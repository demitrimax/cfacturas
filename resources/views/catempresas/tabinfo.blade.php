
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('catempresas.show_fields')
                  <a href="{!! route('catempresas.edit', [$catempresas->id]) !!}" class="btn bg-purple margin">Editar</a>
                <a href="{!! route('catempresas.index') !!}" class="btn btn-default">Regresar</a>
            </div>
        </div>
    </div>
