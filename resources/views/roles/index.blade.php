@extends('layouts.master')


@section('content')


{{--
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

--}}


<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Role Management</h1>
      </div><!-- /.col -->
     
    </div><!-- /.row -->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Roles</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-append">
                @can('role-create') 
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
          @foreach ($roles as $key => $role)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $role->name }}</td>
              <td>
                  <a class="btn btn-sm btn-flat btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                  @can('role-edit')
                      <a class="btn btn-sm btn-flat btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                  @endcan
                  @can('role-delete')
                      {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-flat btn-danger']) !!}
                      {!! Form::close() !!}
                  @endcan
              </td>
          </tr>
          @endforeach

        </table>
        {!! $roles->render() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection