@can('empresas-list')
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Empresas Facturadoras</h3>
      <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
    </button>
  </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if($clientes->accomerciales->count()>0)
      <table class="table table-condensed">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th>Empresa</th>
          <th>Comision</th>
          <th>Correos</th>
        </tr>
      @foreach($clientes->accomerciales as $acuerdos)
        @foreach($acuerdos->empresasfact as $key=>$empresas)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$empresas->empresa->nombre }}</td>
          <td>{{ number_format($empresas->empresa->comision,2) }} </a></td>
          <td>{!! $empresas->empresa->correo_factura !!}</td>
        </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
    @else
    <p>No existen Empresas Facturadoras con el Cliente.</p>
    @endif
    </div>
    <!-- /.box-body -->
  </div>
  @endcan
