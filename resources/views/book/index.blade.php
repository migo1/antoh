@extends('layouts.master')


@section('content')

<div class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Books</h1>
      </div><!-- /.col -->
     
    </div><!-- /.row -->
</div>
    

<div class="row">


        <div class="col-md-2"><br>
        <a class="btn btn-success btn-sm btn-flat" href="{{ route('books_search') }}">Refresh Page</a>
            <form action="{{ route('search') }}" method="GET">
              @csrf
                <h3>Book Search</h3>  
                <label>Book Category :</label>     
                <select name="type_id" class="form-control">
                        <option value="0"></option>
                 @foreach ($types as $type)
                <option value="{{$type->id}}">{{ $type->name }}</option>                                   
                   @endforeach
                </select><br>    
                <label>Title :</label>   
                <input type="text" name="title" class="form-control" placeholder="Book title"><br>       
                <label>Author:</label>
                <input type="text" name="author" class="form-control" placeholder="Author">       
         <br>       
                <input type="submit" value="Search" class="btn btn-secondary">       
                </form>
        
              </div>

    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Books Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#add_book">Add Book</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>No.</th>
              <th>Genre</th>
              <th>Title</th>
              <th>Edition</th>
              <th>Author</th>
              <th>Copies</th>
              <th>Action</th>
            </tr>
            @foreach ( $books as $book )
                
            <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->type->name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->edition }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->total_books }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-flat btn-info" 

             data-mybkid={{ $book->id }}   data-mytyid = {{ $book->id }} data-mytitle = {{ $book->title }} 
             data-myedition = {{ $book->edition }} data-myauthor = {{ $book->author }} data-mytb = {{ $book->total_books }}

                
                data-toggle="modal" data-target="#book_edit"
                >Edit</button>

    

                <button type="button" class="btn btn-sm btn-flat btn-danger"
                data-mybkid={{ $book->id }}
                data-toggle="modal" data-target="#delete_book"
                >Delete</button>
              </td>
            </tr>
           @endforeach

          </table>
          {{ $books->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


    <!-- Modal add_book-->
    <div class="modal fade" id="add_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('books.store')}}">
                <div class="modal-body">
                  @csrf
                  @include('book.create')
                </div>
               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm btn-flat">Create</button>
                </div>
              </form>
              </div>
            </div>
          </div>

          <!--modal edit_book-->
          <div class="modal fade" id="book_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('books.update','test')}}">
                  {{method_field('patch')}}
                  @csrf
                <div class="modal-body">
                <input type="hidden" name="book_id" id="book_id" value="">
                  
                  @include('book.edit')
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
  <div class="modal fade" id="delete_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('books.destroy','test')}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this Book?
          </p>
        <input type="hidden" name="book_id" id="book_id" value="">
        
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
            $('#book_edit').on('show.bs.modal', function (event) {
          
            var button = $(event.relatedTarget) 
            var book_id = button.data('mybkid')
            var type_id = button.data('mytyid')
            var title = button.data('mytitle')
            var edition = button.data('myedition') 
            var author = button.data('myauthor')
            var total_books = button.data('mytb')

            var modal = $(this)
            modal.find('.modal-body #book_id').val(book_id)
            modal.find('.modal-body #type_id').val(type_id)
            modal.find('.modal-body #title').val(title)
            modal.find('.modal-body #edition').val(edition)
            modal.find('.modal-body #author').val(author)
            modal.find('.modal-body #total_books').val(total_books)

          })
            </script>

<script>
  $('#delete_book').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var book_id = button.data('mybkid')

  var modal = $(this)
  modal.find('.modal-body #book_id').val(book_id)

})
  </script>
@endsection