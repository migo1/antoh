@extends('layouts.master')

@section('content')

<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Profile</h1>
      </div>
     
    </div>
</div>

<div class="row">
    <div class="col-md-2">

      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="{{ asset('dist/img/no-image.jpg')}}"
                 alt="User profile picture">
          </div>

        <h3 class="profile-username text-center">{{ $member->first_name }} {{ $member->surname }}</h3>

          <p class="text-muted text-center">{{ $member->occupation }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Contact :</b> <a class="float-right">{{ $member->contact }}</a>
            </li>
            <li class="list-group-item">
              <b>Email :</b> <a class="float-right">{{ $member->email }}</a>
            </li>
          </ul>
          <button type="button" class="btn btn-dark btn-flat btn-sm"
          
          data-toggle="modal" data-target="#renew"
          >Reg/Renew Membership</button>
        </div>
      </div>


    </div>
      <div class="col-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Borrowing History</h3>
  
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <div class="input-group-append">
                  <button type="button" class="btn btn-flat btn-sm btn-info" data-toggle="modal" data-target="#borrow_book">Borrow book</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tr>
                <th>Book</th>
                <th>Borrow date</th>
                <th>Return date</th>
                <th>Returned day</th>
                <th>Days</th>
                <th>status</th>
                <th>*payment</th>
                <th>Action</th>
              </tr>
          @foreach ($member->borrowers as $borrow)
                  
              <tr>
              <td>{{ $borrow->book->title }}</td>
              <td>{{ $borrow->borrow_date }}</td>
              <td>{{ $borrow->return_date }}</td>
              <td>{{ $borrow->return_day }}</td>
              <td>{{ $borrow->total_days }}</td>
              <td>{{ $borrow->status }}</td>
              <td>{{ $borrow->amount }}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-flat btn-primary" 
                  data-mybid = "{{ $borrow->id }}" data-mymid = "{{ $borrow->member_id }}" data-mybkid = "{{ $borrow->book_id }}" data-mybdate = "{{ $borrow->borrow_date }}"
                  data-myrdate ="{{ $borrow->return_date}}" data-mystatus = "{{ $borrow->status }}" data-myreturnDay = "{{ $borrow->return_day }}" 
                  data-toggle="modal" data-target="#edit_borrow"><i class="fa fa-edit"></i></button>


                  <button type="button" class="btn btn-sm btn-flat btn-danger"                  
                  data-mybid = {{ $borrow->id }}                  
                  data-toggle="modal" data-target="#delete_borrow"><i class="fa fa-trash"></i></button>


                  <button type="button" class="btn btn-sm btn-flat btn-light"
                  data-mybid = "{{ $borrow->id }}" data-mymid = "{{ $borrow->member_id }}" data-mybkid = "{{ $borrow->book_id }}" data-mybdate = "{{ $borrow->borrow_date }}"
                  data-myrdate = "{{ $borrow->return_date}}"  data-myreturnDay = "{{ $borrow->return_day }}"  data-mytotal = "{{ $borrow->total_days }}"
                  data-mystatus = "{{ $borrow->status }}" data-myamount = "{{ $borrow->amount }}"
                  data-toggle="modal" data-target="#returned"><i class="fa fa-bookmark"></i></button>
                </td>
              </tr>
              @endforeach
  
            </table>
           {{-- {{ $books->links() }}--}}
          </div>
        </div>
      </div>
  
  </div>

  <!-- Modal borrow_book-->
  <div class="modal fade" id="borrow_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Borrow book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('borrowers.store')}}">
        <div class="modal-body">
          @csrf
          @include('borrow.create')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Borrow</button>
        </div>
      </form>
      </div>
    </div>
  </div>

        <!-- Modal edit-->
<div class="modal fade" id="edit_borrow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('borrowers.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="borrower_id" id="borrower_id" value="">
        
        @include('borrow.edit')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- Modal delete-->
  <div class="modal fade" id="delete_borrow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('borrowers.destroy','test')}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this borrow history?
          </p>
        <input type="hidden" name="borrower_id" id="borrower_id" value="">
        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
        </div>
      </form>
      </div>
    </div>
  </div>

          <!-- Modal returned-->
<div class="modal fade" id="returned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Return status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('borrowers.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="borrower_id" id="borrower_id" value="">
        
        @include('borrow.status')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- Modal renew-->
  <div class="modal fade" id="renew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Renew Membership</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('renews.store')}}">
        <div class="modal-body">
          @csrf
          @include('renew.create')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Renew</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script>
    $('#edit_borrow').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var borrower_id = button.data('mybid')
var book_id = button.data('mybkid')
var member_id = button.data('mymid')
var borrow_date = button.data('mybdate')
var return_date = button.data('myrdate')
var return_day = button.data('myreturnDay')
var total_days = button.data('mytotal')
var status = button.data('mystatus')
var amount = button.data('myamount')

var modal = $(this)
modal.find('.modal-body #borrower_id').val(borrower_id)
modal.find('.modal-body #book_id').val(book_id)
modal.find('.modal-body #member_id').val(member_id)
modal.find('.modal-body #borrow_date').val(borrow_date)
modal.find('.modal-body #return_date').val(return_date)
modal.find('.modal-body #return_day').val(return_day)
modal.find('.modal-body #total_days').val(total_days)
modal.find('.modal-body #status').val(status)
modal.find('.modal-body #amount').val(amount)

})
  </script>

<script>
  $('#delete_borrow').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var borrower_id = button.data('mybid')

  var modal = $(this)
  modal.find('.modal-body #borrower_id').val(borrower_id)

})
  </script>


<script>
  $('#returned').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) 
var borrower_id = button.data('mybid')
var book_id = button.data('mybkid')
var member_id = button.data('mymid')
var borrow_date = button.data('mybdate')
var return_date = button.data('myrdate')
var return_day = button.data('myreturnDay')
var total_days = button.data('mytotal')
var status = button.data('mystatus')
var amount = button.data('myamount')

var modal = $(this)
modal.find('.modal-body #borrower_id').val(borrower_id)
modal.find('.modal-body #book_id').val(book_id)
modal.find('.modal-body #member_id').val(member_id)
modal.find('.modal-body #borrow_date').val(borrow_date)
modal.find('.modal-body #return_date').val(return_date)
modal.find('.modal-body #return_day').val(return_day)
modal.find('.modal-body #total_days').val(total_days)
modal.find('.modal-body #status').val(status)
modal.find('.modal-body #amount').val(amount)

})
</script>

@endsection