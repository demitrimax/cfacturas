{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')
@section('title',config('app.name').' | Permisos' )

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-key"></i>Available Permissions</h3>
              <div class="pull-right">
                <a href="{{ route('user.index') }}" class="btn btn-default pull-right">Users</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
              </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <!-- /.box-header -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Permissions</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
              </div>

          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->


@endsection
