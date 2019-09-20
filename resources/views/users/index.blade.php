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
      <h1 class="m-0 text-dark">Admin's Management</h1>
    </div><!-- /.col -->
   
  </div><!-- /.row -->
</div>

<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Admins</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <div class="input-group-append">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Add New Admin</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                 <label class="badge badge-success">{{ $v }}</label>
              @endforeach
            @endif
          </td>
          <td>
             <a class="btn btn-sm btn-flat btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
             <a class="btn btn-sm btn-flat btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-flat btn-sm btn-danger']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
       @endforeach

      </table>
      {!! $data->render() !!}
        </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
@endsection