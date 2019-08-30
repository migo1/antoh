@extends('layouts.master')


@section('content')
<div class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categories</h1>
        </div><!-- /.col -->
       
      </div><!-- /.row -->
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Categories Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="button" class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#create_category">Create Category</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>No.</th>
              <th>Category</th>
              <th>Shelf</th>
              <th>Action</th>
            </tr>
            @foreach ($types as $type)
                
            <tr>
            <td>{{++$i}}</td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->shelf }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-flat btn-info" 
                
                data-mytyid = {{ $type->id }} data-myname = {{ $type->name }} data-myshelf = {{ $type->shelf }} 

                data-toggle="modal" data-target="#edit">Edit</button>

    

                <button type="button" class="btn btn-sm btn-flat btn-danger"
                
                data-mytyid = {{ $type->id }} 
                
                data-toggle="modal" data-target="#delete">Delete</button>
              </td>
            </tr>
            @endforeach

          </table>
          {{ $types->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <!-- Modal create-->
      <div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('categories.store')}}">
            <div class="modal-body">
              @csrf
              @include('type.create')
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm btn-flat">Create</button>
            </div>
          </form>
          </div>
        </div>
      </div>

      <!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('categories.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="type_id" id="type_id" value="">
        
        @include('type.edit')
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
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('categories.destroy','test')}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this category?
          </p>
        <input type="hidden" name="type_id" id="type_id" value="">
        
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
  $('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var type_id = button.data('mytyid')
  var name = button.data('myname')
  var shelf = button.data('myshelf') 
 
  var modal = $(this)
  modal.find('.modal-body #type_id').val(type_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #shelf').val(shelf)
})
  </script>


<script>
  $('#delete').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var type_id = button.data('mytyid')

  var modal = $(this)
  modal.find('.modal-body #type_id').val(type_id)

})
  </script>
@endsection