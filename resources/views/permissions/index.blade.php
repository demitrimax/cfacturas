{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')
@section('title',config('app.name').' | Permisos' )

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-key"></i>Permisos Disponibles</h3>
              <div class="pull-right">
                <a href="{{ route('user.index') }}" class="btn btn-default pull-right">Usuarios</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
              </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <!-- /.box-header -->
            <div class="table-responsive no-padding">
                <table class="table table-bordered table-striped" id="permisos-table">
                    <thead>
                        <tr>
                            <th>Permiso</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Agregar Permiso</a>
              </div>

          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
@endsection
@section('scripts')
<!-- DataTables -->
<script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#permisos-table').DataTable({
      "language": {
                "url": "{{asset('adminlte/bower_components/datatables.net/Spanish.json')}}"
            }
    })
  })
</script>
@endsection
