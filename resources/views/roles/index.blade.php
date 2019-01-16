@extends('layouts.app')

@section('title',config('app.name').' | Administración de Roles' )

@section('content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary table-responsive no-padding">
            <div class="box-header with-border">
              <h3 class="box-title">Role Management</h3>
              <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Alta de Nuevo Rol</a>
                    @endcan
              </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <!-- /.box-header -->
            <table class="table table-bordered">
              <tr>
                 <th>No</th>
                 <th>Name</th>
                 <th width="280px">Action</th>
              </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
              <!-- /.box-body -->

              <div class="box-footer">
              {!! $roles->render() !!}
              </div>

          </div>
          <!-- /.box -->



        </div>

      </div>
      <!-- /.row -->

@endsection
