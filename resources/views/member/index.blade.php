@extends('layouts.master')


@section('content')

<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Memberships</h1>
      </div><!-- /.col -->
     
    </div><!-- /.row -->
</div>
    

<div class="row">


        <div class="col-md-2"><br>
        <a class="btn btn-success btn-sm btn-flat" href="{{ route('members_search')}}">Refresh Page</a>
        <form action="{{ route('member_search') }}" method="GET">
                    <h3>Member Search</h3>  
                <label>Member ID :</label>   
                <input type="text" name="id" class="form-control" placeholder="member ID..."><br> 
                <label>Contact :</label>   
                <input type="text" name="contact" class="form-control" placeholder="contact"><br>             
                <input type="submit" value="Search" class="btn btn-secondary">       
                </form>
        
              </div>

    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Members Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#add_member">Add Member</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Occupation</th>
              <th>status</th>
              <th>Action</th>
            </tr>
           @foreach ( $members as $member )
                
            <tr>
            <td>{{ $member->id }}</td>
            <td>{{ $member->first_name }}</td>
            <td>{{ $member->surname }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->contact }}</td>
            <td>{{ $member->occupation }}</td>
            <td>{{ $member->status }}</td>
              <td>
                  <a href="/members/{{$member->id}}" class="btn btn-dark btn-flat btn-sm" >Profile</a>

                <button type="button" class="btn btn-sm btn-flat btn-info" 
                data-mymid = {{ $member->id }} data-myfn = {{ $member->first_name }} data-mysn = {{ $member->surname }}
                data-myemail = {{ $member->email }} data-mycontact = {{ $member->contact }} data-myoc = {{ $member->occupation }}
                data-mystatus = {{ $member->status }}
                data-toggle="modal" data-target="#member_edit"
                >Edit</button>

    

                <button type="button" class="btn btn-sm btn-flat btn-danger"
                data-mymid = {{ $member->id }}
                data-toggle="modal" data-target="#delete_member"
                >Delete</button>
              </td>
            </tr>
          @endforeach

          </table>
        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


      <!-- Modal add_member-->
      <div class="modal fade" id="add_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('members.store')}}">
            <div class="modal-body">
              @csrf
              @include('member.create')
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm btn-flat">Add</button>
            </div>
          </form>
          </div>
        </div>
      </div>


                <!--modal edit_member-->
                <div class="modal fade" id="member_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form class="form-horizontal" method="POST" action="{{ route('members.update','test')}}">
                        {{method_field('patch')}}
                        @csrf
                      <div class="modal-body">
                      <input type="hidden" name="member_id" id="member_id" value="">
                        
                        @include('member.edit')
                      </div>
                     
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                            <!-- Modal delete_book-->
  <div class="modal fade" id="delete_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('members.destroy','test')}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this member?
          </p>
        <input type="hidden" name="member_id" id="member_id" value="">
        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
        </div>
      </form>
      </div>
    </div>
  </div>

                <script>
                  $('#member_edit').on('show.bs.modal', function (event) {
                
                  var button = $(event.relatedTarget) 
                  var member_id = button.data('mymid')
                  var first_name = button.data('myfn')
                  var surname = button.data('mysn')
                  var email = button.data('myemail') 
                  var contact = button.data('mycontact')
                  var occupation = button.data('myoc')
                  var status = button.data('mystatus')  

                  var modal = $(this)
                  modal.find('.modal-body #member_id').val(member_id)
                  modal.find('.modal-body #first_name').val(first_name)
                  modal.find('.modal-body #surname').val(surname)
                  modal.find('.modal-body #email').val(email)
                  modal.find('.modal-body #contact').val(contact)
                  modal.find('.modal-body #occupation').val(occupation)
                  modal.find('.modal-body #status').val(status)
      
                })
                  </script>

<script>
  $('#delete_member').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var member_id = button.data('mymid')

  var modal = $(this)
  modal.find('.modal-body #member_id').val(member_id)

})
  </script>
@endsection