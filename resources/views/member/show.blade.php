@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile</h1>
      </div><!-- /.col -->
     
    </div><!-- /.row -->
</div>

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="../../dist/img/user4-128x128.jpg"
                 alt="User profile picture">
          </div>

        <h3 class="profile-username text-center">{{ $member->first_name }} {{ $member->surname }}</h3>

          <p class="text-muted text-center">{{ $member->occupation }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Contact</b> <a class="float-right">{{ $member->contact }}</a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="float-right">{{ $member->contact }}</a>
            </li>
          </ul>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Borrwed books history</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">



            </div>
            <!-- /.tab-pane -->
          
  
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
@endsection